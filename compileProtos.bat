cd app\Protos

echo "COMPILING..."

protoc --proto_path=. --php_out=../Protobuff ./entity.proto

cd ..
cd ..