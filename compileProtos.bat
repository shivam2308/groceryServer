cd app\Protos

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

cd ..
cd ..