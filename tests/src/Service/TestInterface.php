<?php
# Generated by the protocol buffer compiler (spiral/php-grpc). DO NOT EDIT!
# source: test.proto
 
namespace Service;

use Spiral\GRPC;

interface TestInterface extends GRPC\ServiceInterface
{
    // GRPC specific service name.
    public const NAME = "service.Test"; 

    /**
    * @param GRPC\ContextInterface $ctx
    * @param Message $in
    * @return Message
    *
    * @throws GRPC\Exception\InvokeException
    */
    public function Echo(GRPC\ContextInterface $ctx, Message $in): Message;

    /**
    * @param GRPC\ContextInterface $ctx
    * @param Message $in
    * @return Message
    *
    * @throws GRPC\Exception\InvokeException
    */
    public function Throw(GRPC\ContextInterface $ctx, Message $in): Message;

    /**
    * @param GRPC\ContextInterface $ctx
    * @param Message $in
    * @return Message
    *
    * @throws GRPC\Exception\InvokeException
    */
    public function Die(GRPC\ContextInterface $ctx, Message $in): Message;

    /**
    * @param GRPC\ContextInterface $ctx
    * @param Message $in
    * @return Message
    *
    * @throws GRPC\Exception\InvokeException
    */
    public function Info(GRPC\ContextInterface $ctx, Message $in): Message;

    /**
    * @param GRPC\ContextInterface $ctx
    * @param EmptyMessage $in
    * @return EmptyMessage
    *
    * @throws GRPC\Exception\InvokeException
    */
    public function Ping(GRPC\ContextInterface $ctx, EmptyMessage $in): EmptyMessage;
}
