<?php

    use Test\TestCase;
    use Illuminate\Http\Request;
    use Mockery;
    use App\Http\Controllers\ApiController;

class ApiControllerTest
{
    public function test_batch_status_returns_success(){

            $controller = Mockery::mock(ApiController::class)->makePartial();

            $controller->shouldReceive("HttpGetStatus")
                -once()
                ->with("batch")
                ->andReturn(["status" => "ok"]);

            $response = $controller->BatchStatus(new Request());
            $this->assertEquals(["status" => "ok"], $response);
    }

    public function test_batch_status_returns_fail() {
        $controller = Mockery::mock(ApiController::class)->makePartial();
        $controller->shouldReceive("HttpGetStatus")
            -andThrow(new \Exception('API offline'));

        $response = $controller->BatchStatus(new Request());

        $decoded = $response->getData(true);

        $this->assertTrue($decoded["error"]);
        $this->assertEquals("API offline", $decoded["message"]);
        $this->assertEquals(1, $decoded["batchId"]);
    }
}
