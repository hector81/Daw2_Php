<?php

	include './Class/connect.php';
	
	$c = connect::create();
	
	
	try{
		
	//foreach($c->query('SELECT * from almacenes where idTienda = 2') as $fila) {

if($c->beginTransaction()){
		$stmt = $c->prepare("select id from tiendas where nombre = 'el castillo'", array(			PDO::ATTR_CURSOR => PDO::CURSOR_SCROLL));
		$stmt->execute();

		$id1 = $stmt->fetch( PDO::FETCH_ASSOC )['id'];
		
		$stmt = $c->prepare("select id from  tiendas where nombre = 'castellana'", array(			PDO::ATTR_CURSOR => PDO::CURSOR_SCROLL));
		
		$stmt->execute();
		$id2 = $stmt->fetch( PDO::FETCH_ASSOC )['id'];
		
		//echo($id1 . " " . $id2);
		//while ( $row = $stmt->fetch( PDO::FETCH_ASSOC ) ){  
			//print "$row[idTienda]\n";  
		//}  
    //}
	
		$stmt = $c->prepare("select idarticulo, stock from almacenes where idTienda = (select id from tiendas where nombre = 'castellana')", array(PDO::ATTR_CURSOR => PDO::CURSOR_SCROLL));
		$stmt->execute();
		//print_r ($stmt->fetch(PDO::FETCH_BOTH, PDO::FETCH_ORI_FIRST)['idarticulo']);
		$stock = (int)($stmt->fetch(PDO::FETCH_BOTH, PDO::FETCH_ORI_FIRST)['stock']);
		$art = ($stmt->fetch(PDO::FETCH_BOTH, PDO::FETCH_ORI_FIRST)['idarticulo']);
		
		
		

		
		$stmt = $c->prepare("select idtienda from almacenes where idtienda = (select id from tiendas where nombre = 'el castillo')", array(PDO::ATTR_CURSOR => PDO::CURSOR_SCROLL));
		$stmt->execute();
		
		if($stock>0){
			if($stmt->fetch(PDO::FETCH_ASSOC)['idtienda']){

				//$c->exec("update almacenes set stock =". ($stock-1) ." where idtienda = " . $id2);
				//$c->exec("update almacenes set stock =". ($stock+1) ." where idtienda = " . $id1);
				$c->exec("update almacenes set stock =stock-1 where idtienda = " . $id2);
				$c->exec("update almacenes set stock =stock+1 where idtienda = " . $id1);
			}else{

				$c->exec("update almacenes set stock = stock-1 where idtienda = " . $id2);
				$c->exec("insert into almacenes values(".$art.",". $id1 .",1)");
			}
			echo 'success';
			$c->commit();
		}else{
			echo('no stock');
			$c->rollback();
		}
		}else{
			echo "chimichangas";
		}
		$stmt = null;
	
	}catch(PDOException $e){ print $e->getMessage();}

?>