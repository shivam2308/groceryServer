@echo off
cd app
set module=PbModule
mkdir %1%module%
cd %1%module%
set convertor=Convertor
type nul > %1%convertor%.php
set search=Searcher
type nul > %1%search%.php
set service=Service
type nul > %1%service%.php
set tablename=TableName
type nul > %1%tablename%.php
set updator=Updator
type nul > %1%updator%.php
set indexers=Indexers
type nul > %1%indexers%.php
set pbDefaultProvider=PbDefaultProvider
type nul > %1%pbDefaultProvider%.php
set requestHandler=RequestHandler
type nul > %1%requestHandler%.php
set searchRequestPbDefaultProvider=SearchRequestPbDefaultProvider
type nul > %1%searchRequestPbDefaultProvider%.php
cd ..
cd ..


