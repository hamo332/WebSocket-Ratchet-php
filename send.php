<?php
    $entryData = array(
        'first' => "moahmed"
      , 'sec'    => "ahmad"
      , 'thr'  => "eng"
      , 'when'     => time()
    );
    $context = new ZMQContext();
    $socket = $context->getSocket(ZMQ::SOCKET_PUSH, 'my pusher');
    $socket->connect("tcp://localhost:5555");

    $socket->send(json_encode($entryData));
    
    ?>