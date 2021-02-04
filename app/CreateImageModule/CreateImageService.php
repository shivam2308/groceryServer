<?php


namespace App\CreateImageModule;


use App\CustomerModule\CustomerService;
use App\ImagePbModule\ImageHelper;
use App\ImagePbModule\ImageService;
use App\ItemPbModule\ItemService;
use App\Protobuff\CustomerPb;
use App\Protobuff\ImagePb;
use App\Protobuff\ImageTypeEnum;
use App\Protobuff\ItemPb;

class CreateImageService
{
    private $itemService;
    private $customerService;
    private $imageService;
    private $imageHelper;


    public function __construct()
    {
        $this->itemService = new ItemService();
        $this->customerService = new CustomerService();
        $this->imageService = new ImageService();
        $this->imageHelper = new ImageHelper();
    }

    public function create($imagePb)
    {
        $imagePb = $this->imageService->create($imagePb);
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
        return $imagePb;
    }
}
