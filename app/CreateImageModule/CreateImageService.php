<?php


namespace App\CreateImageModule;


use App\CustomerModule\CustomerService;
use App\ImagePbModule\ImageHelper;
use App\ImagePbModule\ImageService;
use App\ItemPbModule\ItemService;
use App\Protobuff\ImageTypeEnum;

class CreateImageService
{
    private $itemService;
    private $customerService;
    private $imageService;
    private $imageHelper;
    private $isCreate= false;


    public function __construct()
    {
        $this->itemService = new ItemService();
        $this->customerService = new CustomerService();
        $this->imageService = new ImageService();
        $this->imageHelper = new ImageHelper();
    }

    public function create($imagePb)
    {
        $this->isCreate= false;
        $imageSearchResp = $this->imageService->search($this->imageHelper->getImageSearchReq($imagePb));
        if($imageSearchResp->getSummary()->getResultCount()==0){
            $imagePb = $this->imageService->create($imagePb);
            $this->isCreate=true;
        }else{
            $image = $imageSearchResp->getResults()[0];
            $image->setUrl($imagePb->getUrl());
            $this->imageService->update($image->getDbInfo()->getId(),$image);
            $imagePb = $this->imageService->get($image->getDbInfo()->getId());
            $this->isCreate= false;
        }
        if($this->isCreate) {
            if ($imagePb->getImageType() == ImageTypeEnum::PROFILE_IMAGE) {
                $customer = $this->customerService->get($imagePb->getId());
                $customer->setProfileImage($this->imageHelper->getImageRef($imagePb));
                $this->customerService->update($customer->getDbInfo()->getId(), $customer);
            } elseif ($imagePb->getImageType() == ImageTypeEnum::ITEM_IMAGE) {
                $item = $this->itemService->get($imagePb->getId());
                $item->setItemImage($this->imageHelper->getImageRef($imagePb));
                $this->itemService->update($item->getDbInfo()->getId(), $item);
            } else {
                //nothing
            }
        }
        return $imagePb;
    }
}
