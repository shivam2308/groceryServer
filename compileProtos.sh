cd app/Protos

echo "COMPILING..."

protoc --proto_path=. --php_out=../.. ./requestPb.proto
protoc --proto_path=. --php_out=../.. ./entityPb.proto
protoc --proto_path=. --php_out=../.. ./timePb.proto
protoc --proto_path=. --php_out=../.. ./addressPb.proto
protoc --proto_path=. --php_out=../.. ./contactDetailPb.proto
protoc --proto_path=. --php_out=../.. ./genderPb.proto
protoc --proto_path=. --php_out=../.. ./imagePb.proto
protoc --proto_path=. --php_out=../.. ./namePb.proto
protoc --proto_path=. --php_out=../.. ./summaryPb.proto
protoc --proto_path=. --php_out=../.. ./customerPb.proto
protoc --proto_path=. --php_out=../.. ./itemPb.proto
protoc --proto_path=. --php_out=../.. ./deliveryManPb.proto
protoc --proto_path=. --php_out=../.. ./loginPb.proto
protoc --proto_path=. --php_out=../.. ./buyPb.proto
protoc --proto_path=. --php_out=../.. ./registrationPb.proto
protoc --proto_path=. --php_out=../.. ./pushNotificationPb.proto
protoc --proto_path=. --php_out=../.. ./booleanPb.proto
protoc --proto_path=. --php_out=../.. ./paymentPb.proto
protoc --proto_path=. --php_out=../.. ./orderedListPb.proto
protoc --proto_path=. --php_out=../.. ./confirmOrderDeliveryPb.proto

cd ..
cd ..

cd App

cp -r GPBMetadata /home/tiwari/ShivamProject/groceryServer/app/
#find -exec mv {} /home/tiwari/ShivamProject/groceryServer/app/GPBMetadata/ \;

rm -r GPBMetadata

cp -r Protobuff /home/tiwari/ShivamProject/groceryServer/app/
#find -exec mv {} /home/tiwari/ShivamProject/groceryServer/app/Protobuff/ \;

rm -r Protobuff
cd ..
rm -r App

