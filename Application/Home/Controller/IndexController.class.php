<?php
namespace Home\Controller;
use Think\Controller;
use Think\Model;
class IndexController extends Controller {

	public function index() {
		$this -> redirect("Admin/Index/index");
	}

	/**
	 * 解析base64编码成图片
	 */
	public function decodeBase64() {
		$base64 = "/9j/4AAQSkZJRgABAQEAkACQAAD/4QCMRXhpZgAATU0AKgAAAAgABQESAAMAAAABAAEAAAEaAAUAAAABAAAASgEbAAUAAAABAAAAUgEoAAMAAAABAAIAAIdpAAQAAAABAAAAWgAAAAAAAACQAAAAAQAAAJAAAAABAAOgAQADAAAAAQABAACgAgAEAAAAAQAAAHKgAwAEAAAAAQAAAHIAAAAA/9sAQwAfFRcbFxMfGxkbIyEfJS9OMi8rKy9fREg4TnBjdnRuY21rfIyyl3yEqYZrbZvTnam4vsjKyHiV2+rZwumyxMjA/9sAQwEhIyMvKS9bMjJbwIBtgMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDA/8AAEQgAcgByAwEiAAIRAQMRAf/EAB8AAAEFAQEBAQEBAAAAAAAAAAABAgMEBQYHCAkKC//EALUQAAIBAwMCBAMFBQQEAAABfQECAwAEEQUSITFBBhNRYQcicRQygZGhCCNCscEVUtHwJDNicoIJChYXGBkaJSYnKCkqNDU2Nzg5OkNERUZHSElKU1RVVldYWVpjZGVmZ2hpanN0dXZ3eHl6g4SFhoeIiYqSk5SVlpeYmZqio6Slpqeoqaqys7S1tre4ubrCw8TFxsfIycrS09TV1tfY2drh4uPk5ebn6Onq8fLz9PX29/j5+v/EAB8BAAMBAQEBAQEBAQEAAAAAAAABAgMEBQYHCAkKC//EALURAAIBAgQEAwQHBQQEAAECdwABAgMRBAUhMQYSQVEHYXETIjKBCBRCkaGxwQkjM1LwFWJy0QoWJDThJfEXGBkaJicoKSo1Njc4OTpDREVGR0hJSlNUVVZXWFlaY2RlZmdoaWpzdHV2d3h5eoKDhIWGh4iJipKTlJWWl5iZmqKjpKWmp6ipqrKztLW2t7i5usLDxMXGx8jJytLT1NXW19jZ2uLj5OXm5+jp6vLz9PX29/j5+v/aAAwDAQACEQMRAD8A6GiiigAooqF5scL+dAEpIHU4phmQepquSWOSc0UwJvPH939aPP8A9n9ahooAsCZT1yKeCG6HNVKASDkHFAFyioEm7N+dTAgjIpALRRRQAUUUUAFFFQzv/CPxoAbLJuOB0/nUdFFMAoopyIXPH50ANoqTES9SWPtR+6b1WgCOinPGU56j1ptABTo5Ch9vSm0UAWwQRkdKWq8L4O09DVikAUUUUAIx2qT6VUJycmp5zhQPWoKYBRRRQAdalkOxQi/jUaffX606b/WGgBlFFFAEkTZ+RuhpjDaxHpQn31+tOm/1hoAZRRRQAVajbcgPeqtS255I/GgCeiiikBBcfeA9qiqS4++PpUdMAooooAKlceYoZeo6ioqkjRh82do96AI6KmZoieRk+1N3xr91Mn3oAI12je3QdKjJyST3pXcueaSgAooooAKfD/rBTKfD/rBQBZooopAQ3A6GoasyruQiq1MAoopVG5gPWgB6KFXe34CmO5c5NOmPzbR0FMoAKKKKACpNoePKjkdRUdOiba49+KAG0U6RdrkU2gAqSAfOT6Co6sQLhM+tAElFFFIAqtKm1vY1ZprqHXBoAq06MhXBPSkZSpwaSmArHLE+ppKKKACiiigAooooAfKwZsj0plFABJwOtADkXe2KtdKZGmxffvT6QBRRRQAUUUUANdA4waruhQ89PWrVFAFOip2hU9OKYYXHTBpgR0U7Y/8AdNJsb+6fyoASiniFz2xUiwAfeOaAIVUscAVYjjCD1PrTgABgDFLSAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKAP/2Q==";
		$img = base64_decode($base64);
		$a = file_put_contents('./Uploads/gpy/test.jpg', $img);
		//返回的是字节数
		print_r($a);
	}

	public function printer() {
		//header('Content-Type: text/html; charset=utf-8');
		$fp = fsockopen("192.168.1.202", 9100, $errno, $errstr, 10);
		if (!$fp) {
			echo "$errstr ($errno)<br />/n";
		} else {
			$out = "美亚大酒店西餐厅";
			$out .= "======================================/n";
			//fwrite($fp, $out);
			fwrite($fp, $out);
			// $this->MIEA_delay(500);
			// for ($i = 1; $i <= 20; $i++) {//测试20行数据
				// if ($i < 10)
					// $tmp = "0" . $i;
				// else
					// $tmp = $i;
				// $out = $tmp . " 123456789a123456789b123456789c/n";
				// fwrite($fp, $out);
				// $this->MIEA_delay(100);
			// }
			// //连续打印$k行空格
			// $k = 3;
			// for ($i = 0; $i < $k; $i++) {
				// fwrite($fp, chr(13) . chr(10));
				// $this->MIEA_delay(100);
			// }
			// //最后五行用于挤出缓冲区内容
			// $out = "/n/n/n/n/n";
			// fwrite($fp, $out);
			// $this->MIEA_delay(100);
// 
			// //切纸
			// $out = chr(29) . "V1";
			// fwrite($fp, $out);
		}
		fclose($fp);
	}

	//毫秒级延时函数 0<dblLong<1000
	public function MIEA_delay($dblLong) {
		if ($dblLong >= 1000)
			$dblLong = 999;
		$startTime = floor(microtime() * 1000);
		$endTime = $startTime + $dblLong;
		if ($endTime > 999)
			$endTime = $endTime - 999;
		while (floor(microtime() * 1000) != $endTime) {
			//echo floor(microtime()*1000)."<br>";
		}
	}

}
