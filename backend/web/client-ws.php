<?php
use Amp\Delayed;
use Amp\Websocket;
echo "hi";
// Connects to the websocket endpoint in demo.php provided with Aerys (https://github.com/amphp/aerys).
Amp\Loop::run(function () {
    /** @var \Amp\Websocket\Connection $connection */
    $connection = yield Websocket\connect("ws://127.0.0.1:9501");
    yield $connection->send("Hello!");

    $i = 0;

    while ($message = yield $connection->receive()) {
        $payload = yield $message->buffer();
        printf("Received: %s\n", $payload);

        if ($payload === "Goodbye!") {
            $connection->close();
            break;
        }

        yield new Delayed(1000);

        if ($i < 3) {
            yield $connection->send("Ping: " . ++$i);
        } else {
            yield $connection->send("Goodbye!");
        }
    }
});
?>
