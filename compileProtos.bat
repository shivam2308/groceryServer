cd app\Protos

echo "COMPILING..."
protoc --proto_path=. --php_out=../.. ./summaryPb.proto
protoc --proto_path=. --php_out=../.. ./requestPb.proto
protoc --proto_path=. --php_out=../.. ./entityPb.proto
protoc --proto_path=. --php_out=../.. ./timePb.proto
protoc --proto_path=. --php_out=../.. ./customerPb.proto

cd ..
cd ..