<?php

class LibrosRepositorio
{
    public function mostrarlibrosPaginaPrincipal() :array{
      //LLAMAMOS A LA VISTA librosPaginaPrincipal
      $sql = "select IdLibro, Titulo,YearPublicacion ,nombre_autor,Idioma,Paginas,PVP,Descripcion,Portada,NombreCategoria
       from librosPaginaPrincipal
          WHERE IdLibro < 19;";
      $librosPagina = [];$libro = [];
      include_once __DIR__ . '/../../core/conexionBaseDatos.inc';
      try{
          $con = (new ConexionBaseDatos)->getConexion();
          $con->beginTransaction();
          $stmt = $con->prepare($sql);
          $stmt->execute();
          while($row =$stmt->fetch(PDO::FETCH_ASSOC)){
              $libro = [
                  'IdLibro' => $row['IdLibro'],
                  'Titulo' => $row['Titulo'],
                  'YearPublicacion' => $row['YearPublicacion'],
                  'nombre_autor' => $row['nombre_autor'],
                  'Idioma' => $row['Idioma'],
                  'Paginas' => $row['Paginas'],
                  'PVP' => $row['PVP'],
                  'Descripcion' => $row['Descripcion'],
                  'Portada' => $row['Portada'],
                  'NombreCategoria' => $row['NombreCategoria']
              ];
              $librosPagina[] = $libro;
          }
          $con->commit();
          return $librosPagina;
      }catch(PDOException $ex){
        //throw new Exception("Error Processing Request", 1); //el inc es para los includes
         throw $ex;
         $con->rollBack();
      }finally{
        $con = null;
        $stmt = null;
      }

    }//fin metodo

    public function librosCategoriasLateral() :array{
      //LLAMAMOS A LA VISTA LibrosLateral1
      $sql = "select IdCategoria,NombreCategoria, numero from LibrosLateral1";
      $lateralCategorias = [];$categoria = [];
      include_once __DIR__ . '/../../core/conexionBaseDatos.inc';
      try{
          $con = (new ConexionBaseDatos)->getConexion();
          $con->beginTransaction();
          $stmt = $con->prepare($sql);
          $stmt->execute();
          while($row =$stmt->fetch(PDO::FETCH_ASSOC)){
              $categoria = [
                  'IdCategoria' => $row['IdCategoria'],
                  'NombreCategoria' => $row['NombreCategoria'],
                  'numero' => $row['numero']
              ];
              $lateralCategorias[] = $categoria;
          }
          $con->commit();
          return $lateralCategorias;
      }catch(PDOException $ex){
        //throw new Exception("Error Processing Request", 1); //el inc es para los includes
         throw $ex;
         $con->rollBack();
      }finally{
        $con = null;
        $stmt = null;
      }
    }
    public function librosSubCategoriasLateral() :array{
      //LLAMAMOS A LA VISTA LibrosLateral2
      $sql = "select IdSubCategoria,NombreSubCategoria, IdCategoria,numero from LibrosLateral2";
      $lateralSubCategorias = [];$subCategoria = [];
      include_once __DIR__ . '/../../core/conexionBaseDatos.inc';
      try{
          $con = (new ConexionBaseDatos)->getConexion();
          $con->beginTransaction();
          $stmt = $con->prepare($sql);
          $stmt->execute();
          while($row =$stmt->fetch(PDO::FETCH_ASSOC)){
              $subCategoria = [
                  'IdSubCategoria' => $row['IdSubCategoria'],
                  'NombreSubCategoria' => $row['NombreSubCategoria'],
                  'IdCategoria' => $row['IdCategoria'],
                  'numero' => $row['numero']
              ];
              $lateralSubCategorias[] = $subCategoria;
          }
          $con->commit();
          return $lateralSubCategorias;
      }catch(PDOException $ex){
        //throw new Exception("Error Processing Request", 1); //el inc es para los includes
         throw $ex;
         $con->rollBack();
      }finally{
        $con = null;
        $stmt = null;
      }
    }


    public function verLibrosIndividual(int $idLibro) :array{
      //LLAMAMOS A LA VISTA libroIndividual
      $sql = "SELECT  IdEjemplar,IdLibro,Nombre_Categoria
      	,IdSubCategoria,Nombre_SubCategoria
      	,Titulo,YearPublicacion,FechaDisponibilidad  ,nombre_autor ,
      	 Encuadernacion,  Numero_Edicion,
      	 Formato,Idioma,ISBN,Paginas,PVP,Descripcion,Portada
      FROM libroIndividual WHERE IdLibro = ?;";
      $libro = [];
      include_once __DIR__ . '/../../core/conexionBaseDatos.inc';
      try{
          $con = (new ConexionBaseDatos)->getConexion();
          $con->beginTransaction();
          $stmt = $con->prepare($sql);
          $stmt->bindParam(1,$idLibro,PDO::PARAM_INT);
          $stmt->execute();
          while($row =$stmt->fetch(PDO::FETCH_ASSOC)){
              $libro = [
                  'IdEjemplar' => $row['IdEjemplar'],
                  'IdLibro' => $row['IdLibro'],
                  'Nombre_Categoria' => $row['Nombre_Categoria'],
                  'IdSubCategoria' => $row['IdSubCategoria'],
                  'Nombre_SubCategoria' => $row['Nombre_SubCategoria'],
                  'Titulo' => $row['Titulo'],
                  'YearPublicacion' => $row['YearPublicacion'],
                  'FechaDisponibilidad' => $row['FechaDisponibilidad'],
                  'nombre_autor' => $row['nombre_autor'],
                  'Encuadernacion' => $row['Encuadernacion'],
                  'Numero_Edicion' => $row['Numero_Edicion'],
                  'Formato' => $row['Formato'],
                  'Idioma' => $row['Idioma'],
                  'ISBN' => $row['ISBN'],
                  'Paginas' => $row['Paginas'],
                  'PVP' => $row['PVP'],
                  'Descripcion' => $row['Descripcion'],
                  'Portada' => $row['Portada'],
              ];
          }
          $con->commit();
          return $libro;
      }catch(PDOException $ex){
        //throw new Exception("Error Processing Request", 1); //el inc es para los includes
         throw $ex;
         $con->rollBack();
      }finally{
        $con = null;
        $stmt = null;
      }

    }//fin metodo


    public function verLibrosPorSubCategoria(int $IdSubCategoria) :array{
      //LLAMAMOS A LA VISTA libroIndividual
      $sql = "SELECT IdLibro,IdSubCategoria,NombreCategoria,NombreSubCategoria,
              Titulo,YearPublicacion
              ,FechaDisponibilidad,Idioma,ISBN, Paginas,PVP,Descripcion,Portada
              FROM librosSubcategoriasVer WHERE IdSubCategoria = ?;";
      $libro = [];$arrayLibro = [];
      include_once __DIR__ . '/../../core/conexionBaseDatos.inc';
      try{
          $con = (new ConexionBaseDatos)->getConexion();
          $con->beginTransaction();
          $stmt = $con->prepare($sql);
          $stmt->bindParam(1,$IdSubCategoria,PDO::PARAM_INT);
          $stmt->execute();
          while($row =$stmt->fetch(PDO::FETCH_ASSOC)){
              $libro = [
                  'IdLibro' => $row['IdLibro'],
                  'IdSubCategoria' => $row['IdSubCategoria'],
                  'NombreCategoria' => $row['NombreCategoria'],
                  'NombreSubCategoria' => $row['NombreSubCategoria'],
                  'Titulo' => $row['Titulo'],
                  'YearPublicacion' => $row['YearPublicacion'],
                  'FechaDisponibilidad' => $row['FechaDisponibilidad'],
                  'Idioma' => $row['Idioma'],
                  'ISBN' => $row['ISBN'],
                  'Paginas' => $row['Paginas'],
                  'PVP' => $row['PVP'],
                  'Descripcion' => $row['Descripcion'],
                  'Portada' => $row['Portada'],
              ];
              $arrayLibro[] = $libro;
          }
          $con->commit();
          return $arrayLibro;
      }catch(PDOException $ex){
        //throw new Exception("Error Processing Request", 1); //el inc es para los includes
         throw $ex;
         $con->rollBack();
      }finally{
        $con = null;
        $stmt = null;
      }

    }//fin metodo

    public function devolverIdCategoria(string $nombreCategoria) :int{
        $sql = "SELECT IdCategoria FROM Categorias WHERE NombreCategoria = ?;";
        $idCategoria = 0;
        include_once __DIR__ . '/../../core/conexionBaseDatos.inc';
        try{
            $con = (new ConexionBaseDatos)->getConexion();
            $con->beginTransaction();
            $stmt = $con->prepare($sql);
            $stmt->bindParam(1,$nombreCategoria,PDO::PARAM_STR);
            $stmt->execute();
            while($row =$stmt->fetch(PDO::FETCH_ASSOC)){
                $idCategoria = $row['IdCategoria'];
            }
            $con->commit();
            return $idCategoria;
        }catch(PDOException $ex){
          //throw new Exception("Error Processing Request", 1); //el inc es para los includes
           throw $ex;
           $con->rollBack();
        }finally{
          $con = null;
          $stmt = null;
        }
    }//fin metodo

    //funcion para devolver todos los años de los libros
    public function devolverYearLibros() :array{
        $sql = "SELECT YearPublicacion FROM ejemplares ORDER BY YearPublicacion ASC ";
        $year = [];
        include_once __DIR__ . '/../../core/conexionBaseDatos.inc';
        try{
            $con = (new ConexionBaseDatos)->getConexion();
            $con->beginTransaction();
            $stmt = $con->prepare($sql);
            $stmt->execute();
            while($row =$stmt->fetch(PDO::FETCH_ASSOC)){
                $year[] = $row['YearPublicacion'];
            }
            $con->commit();
            return $year;
        }catch(PDOException $ex){
           throw $ex;
           $con->rollBack();
        }finally{
          $con = null;
          $stmt = null;
        }
    }//fin metodo













    // 
    // <?php
    //
    //
    //
    // CREATE VIEW Vista_para_busquedas AS
    // SELECT Ejemplares.IdEjemplar AS ID_EJEMPLAR, Libros.IdLibro AS ID_LIBRO ,Categorias.NombreCategoria AS NOMBRE_CATEGORIA,SubCategorias.IdSubCategoria AS ID_SUBCATEGORIA,
    // 	Subcategorias.NombreSubCategoria AS  NOMBRE_SUBCATEGORIA
    // 	,Libros.Titulo AS TITULO_LIBRO ,Ejemplares.YearPublicacion AS YEAR_PUBLICACION ,Ejemplares.FechaDisponibilidad AS FECHA_DISPONIBILIDAD ,Autores.Nombre AS NOMBRE_AUTOR ,
    // 	Ejemplares.Encuadernacion AS ENCUADERNACION, Ejemplares.NumeroEdicion AS NUMERO_EDICION,
    // 	 Ejemplares.Formato AS FORMATO_EJEMPLAR,
    // 	 Ejemplares.Idioma AS IDIOMA_EJEMPLAR,Ejemplares.ISBN AS ISBN_EJEMPLAR,
    // 	 Ejemplares.Paginas AS PAGINAS_EJEMPLAR,Ejemplares.PVP AS PVP_EJEMPLAR,
    // 	 Libros.Descripcion AS LIBRO_DESCRIPCION ,Ejemplares.Portada AS PORTADA_EJEMPLAR,
    //      Autores.IdAutor AS ID_AUTOR, Editoriales.Nombre as NOMBRE_EDITORIAL,Ejemplares.IdEditorial AS ID_EDITORIAL_EJEMPLAR,
    //      Almacen.Stock AS STOCK_DISPONIBLE, Almacen.IdTienda AS ID_TIENDA, Tiendas.Nombre AS TIENDA_NOMBRE
    // FROM Libros
    // JOIN Autores ON Autores.IdAutor = Libros.IdAutor
    // JOIN Subcategorias ON subcategorias.IdSubCategoria = Libros.IdSubCategoria
    // JOIN Categorias ON Categorias.IdCategoria = Subcategorias.IdCategoria
    // JOIN Ejemplares ON Ejemplares.IdLibro = Libros.IdLibro
    // JOIN Editoriales ON Editoriales.IdEditorial = Ejemplares.IdEditorial
    // JOIN Almacen ON Almacen.IdEjemplar = Ejemplares.IdEjemplar
    // JOIN Tiendas ON Tiendas.IdTienda = Almacen.IdTienda
    //
    //
    // sql
    // SELECT ID_EJEMPLAR, ID_LIBRO ,NOMBRE_CATEGORIA,ID_SUBCATEGORIA,
    // 	  NOMBRE_SUBCATEGORIA
    // 	, TITULO_LIBRO , YEAR_PUBLICACION ,FECHA_DISPONIBILIDAD , NOMBRE_AUTOR ,
    // 	 ENCUADERNACION, NUMERO_EDICION,
    // 	  FORMATO_EJEMPLAR,
    // 	 IDIOMA_EJEMPLAR,ISBN_EJEMPLAR,
    // 	 PAGINAS_EJEMPLAR, PVP_EJEMPLAR,
    // 	  LIBRO_DESCRIPCION , PORTADA_EJEMPLAR,
    //       ID_AUTOR,  NOMBRE_EDITORIAL,ID_EDITORIAL_EJEMPLAR,
    //       STOCK_DISPONIBLE,  ID_TIENDA,  TIENDA_NOMBRE
    // FROM Vista_para_busquedas
    //
    //
    //
    //
    //
    // public function devolverResultadosBusqueda(int $autoresId,int $editorialId,int $tiendasId,string $yearPublicacion) :array{
    //       //LLAMAMOS A LA VISTA libroIndividual
    //       $sql = "SELECT ID_EJEMPLAR, ID_LIBRO ,NOMBRE_CATEGORIA,ID_SUBCATEGORIA,
    // 				NOMBRE_SUBCATEGORIA
    // 				, TITULO_LIBRO , YEAR_PUBLICACION ,FECHA_DISPONIBILIDAD , NOMBRE_AUTOR ,
    // 				ENCUADERNACION, NUMERO_EDICION,
    // 				FORMATO_EJEMPLAR,
    // 				IDIOMA_EJEMPLAR,ISBN_EJEMPLAR,
    // 				PAGINAS_EJEMPLAR, PVP_EJEMPLAR,
    // 				LIBRO_DESCRIPCION , PORTADA_EJEMPLAR,
    // 				ID_AUTOR,  NOMBRE_EDITORIAL,ID_EDITORIAL_EJEMPLAR,
    // 				STOCK_DISPONIBLE,  ID_TIENDA,  TIENDA_NOMBRE
    // 			FROM Vista_para_busquedas
    // 			WHERE ID_AUTOR = ? OR ID_EDITORIAL_EJEMPLAR = ? OR ID_TIENDA = ? OR YEAR_PUBLICACION = ?;";
    //       $busqueda = [];
    //       include_once __DIR__ . '/../../core/conexionBaseDatos.inc';
    //       try{
    //           $con = (new ConexionBaseDatos)->getConexion();
    //           $con->beginTransaction();
    //           $stmt = $con->prepare($sql);
    //           $stmt->bindParam(1,$autoresId,PDO::PARAM_INT);
    // 		  $stmt->bindParam(2,$editorialId,PDO::PARAM_INT);
    // 		  $stmt->bindParam(3,$tiendasId,PDO::PARAM_INT);
    // 		  $stmt->bindParam(4,$yearPublicacion,PDO::PARAM_STR);
    //           $stmt->execute();
    //           while($row =$stmt->fetch(PDO::FETCH_ASSOC)){
    //               $busqueda = [
    //                   'ID_EJEMPLAR' => $row['ID_EJEMPLAR'],
    //                   'ID_LIBRO' => $row['ID_LIBRO'],
    //                   'NOMBRE_CATEGORIA' => $row['NOMBRE_CATEGORIA'],
    // 				  'ID_SUBCATEGORIA' => $row['ID_SUBCATEGORIA'],
    // 				  'NOMBRE_SUBCATEGORIA' => $row['NOMBRE_SUBCATEGORIA'],
    // 				  'TITULO_LIBRO' => $row['TITULO_LIBRO'],
    // 				  'YEAR_PUBLICACION' => $row['YEAR_PUBLICACION'],
    // 				  'FECHA_DISPONIBILIDAD' => $row['FECHA_DISPONIBILIDAD'],
    // 				  'NOMBRE_AUTOR' => $row['NOMBRE_AUTOR'],
    // 				  'ENCUADERNACION' => $row['ENCUADERNACION'],
    // 				  'NUMERO_EDICION' => $row['NUMERO_EDICION'],
    // 				  'FORMATO_EJEMPLAR' => $row['FORMATO_EJEMPLAR'],
    // 				  'IDIOMA_EJEMPLAR' => $row['IDIOMA_EJEMPLAR'],
    // 				  'ISBN_EJEMPLAR' => $row['ISBN_EJEMPLAR'],
    // 				  'PAGINAS_EJEMPLAR' => $row['PAGINAS_EJEMPLAR'],
    // 				  'PVP_EJEMPLAR' => $row['PVP_EJEMPLAR'],
    // 				  'LIBRO_DESCRIPCION' => $row['LIBRO_DESCRIPCION'],
    // 				  'PORTADA_EJEMPLAR' => $row['PORTADA_EJEMPLAR'],
    // 				  'ID_AUTOR' => $row['ID_AUTOR'],
    // 				  'NOMBRE_EDITORIAL' => $row['NOMBRE_EDITORIAL'],
    // 				  'ID_EDITORIAL_EJEMPLAR' => $row['ID_EDITORIAL_EJEMPLAR'],
    // 				  'STOCK_DISPONIBLE' => $row['STOCK_DISPONIBLE'],
    // 				  'ID_TIENDA' => $row['ID_TIENDA'],
    // 				  'TIENDA_NOMBRE' => $row['TIENDA_NOMBRE'],
    //               ];
    //           }
    //           $con->commit();
    //           return $busqueda;
    //       }catch(PDOException $ex){
    //         //throw new Exception("Error Processing Request", 1); //el inc es para los includes
    //          throw $ex;
    //          $con->rollBack();
    //       }finally{
    //         $con = null;
    //         $stmt = null;
    //       }
    //
    //     }//fin metodo
    //
    //
    //
    //
    //
    //











    //
    // 	SELECT Ejemplares.IdEjemplar AS ID_EJEMPLAR, Libros.IdLibro AS ID_LIBRO ,Categorias.NombreCategoria AS NOMBRE_CATEGORIA,SubCategorias.IdSubCategoria AS ID_SUBCATEGORIA,
    // 	Subcategorias.NombreSubCategoria AS  NOMBRE_SUBCATEGORIA
    // 	,Libros.Titulo AS TITULO_LIBRO ,Ejemplares.YearPublicacion AS YEAR_PUBLICACION ,Ejemplares.FechaDisponibilidad AS FECHA_DISPONIBILIDAD ,Autores.Nombre AS NOMBRE_AUTOR ,
    // 	Ejemplares.Encuadernacion AS ENCUADERNACION, Ejemplares.NumeroEdicion AS NUMERO_EDICION,
    // 	 Ejemplares.Formato AS FORMATO_EJEMPLAR,
    // 	 Ejemplares.Idioma AS IDIOMA_EJEMPLAR,Ejemplares.ISBN AS ISBN_EJEMPLAR,
    // 	 Ejemplares.Paginas AS PAGINAS_EJEMPLAR,Ejemplares.PVP AS PVP_EJEMPLAR,
    // 	 Libros.Descripcion AS LIBRO_DESCRIPCION ,Ejemplares.Portada AS PORTADA_EJEMPLAR,
    //      Autores.IdAutor AS ID_AUTOR, Editoriales.Nombre as NOMBRE_EDITORIAL,Ejemplares.IdEditorial AS ID_EDITORIAL_EJEMPLAR
    // FROM Libros
    // JOIN Autores ON Autores.IdAutor = Libros.IdAutor
    // JOIN Subcategorias ON subcategorias.IdSubCategoria = Libros.IdSubCategoria
    // JOIN Categorias ON Categorias.IdCategoria = Subcategorias.IdCategoria
    // JOIN Ejemplares ON Ejemplares.IdLibro = Libros.IdLibro
    // JOIN Editoriales ON Editoriales.IdEditorial = Ejemplares.IdEditorial
    //
    //
    //
    //
    // SELECT ID_EJEMPLAR, ID_LIBRO ,NOMBRE_CATEGORIA,ID_SUBCATEGORIA,
    // 				NOMBRE_SUBCATEGORIA
    // 				, TITULO_LIBRO , YEAR_PUBLICACION ,FECHA_DISPONIBILIDAD , NOMBRE_AUTOR ,
    // 				ENCUADERNACION, NUMERO_EDICION,
    // 				FORMATO_EJEMPLAR,
    // 				IDIOMA_EJEMPLAR,ISBN_EJEMPLAR,
    // 				PAGINAS_EJEMPLAR, PVP_EJEMPLAR,
    // 				LIBRO_DESCRIPCION , PORTADA_EJEMPLAR,
    // 				ID_AUTOR,  NOMBRE_EDITORIAL,ID_EDITORIAL_EJEMPLAR,
    //
    // 			FROM Vista_para_busquedas
    //
    // public function devolverResultadosBusqueda(int $autoresId,int $editorialId,int $tiendasId,string $yearPublicacion) :array{
    //       //LLAMAMOS A LA VISTA libroIndividual
    //       $sql = "SELECT ID_EJEMPLAR, ID_LIBRO ,NOMBRE_CATEGORIA,ID_SUBCATEGORIA,
    // 				NOMBRE_SUBCATEGORIA
    // 				, TITULO_LIBRO , YEAR_PUBLICACION ,FECHA_DISPONIBILIDAD , NOMBRE_AUTOR ,
    // 				ENCUADERNACION, NUMERO_EDICION,
    // 				FORMATO_EJEMPLAR,
    // 				IDIOMA_EJEMPLAR,ISBN_EJEMPLAR,
    // 				PAGINAS_EJEMPLAR, PVP_EJEMPLAR,
    // 				LIBRO_DESCRIPCION , PORTADA_EJEMPLAR,
    // 				ID_AUTOR,  NOMBRE_EDITORIAL,ID_EDITORIAL_EJEMPLAR,
    //
    // 			FROM Vista_para_busquedas
    // 			WHERE ID_AUTOR = ? OR ID_EDITORIAL_EJEMPLAR = ? OR YEAR_PUBLICACION = ?;";
    //       $busqueda = [];
    //       include_once __DIR__ . '/../../core/conexionBaseDatos.inc';
    //       try{
    //           $con = (new ConexionBaseDatos)->getConexion();
    //           $con->beginTransaction();
    //           $stmt = $con->prepare($sql);
    //           $stmt->bindParam(1,$autoresId,PDO::PARAM_INT);
    // 		  $stmt->bindParam(2,$editorialId,PDO::PARAM_INT);
    // 		  $stmt->bindParam(3,$tiendasId,PDO::PARAM_INT);
    // 		  $stmt->bindParam(4,$yearPublicacion,PDO::PARAM_STR);
    //           $stmt->execute();
    //           while($row =$stmt->fetch(PDO::FETCH_ASSOC)){
    //               $busqueda = [
    //                   'ID_EJEMPLAR' => $row['ID_EJEMPLAR'],
    //                   'ID_LIBRO' => $row['ID_LIBRO'],
    //                   'NOMBRE_CATEGORIA' => $row['NOMBRE_CATEGORIA'],
    // 				  'ID_SUBCATEGORIA' => $row['ID_SUBCATEGORIA'],
    // 				  'NOMBRE_SUBCATEGORIA' => $row['NOMBRE_SUBCATEGORIA'],
    // 				  'TITULO_LIBRO' => $row['TITULO_LIBRO'],
    // 				  'YEAR_PUBLICACION' => $row['YEAR_PUBLICACION'],
    // 				  'FECHA_DISPONIBILIDAD' => $row['FECHA_DISPONIBILIDAD'],
    // 				  'NOMBRE_AUTOR' => $row['NOMBRE_AUTOR'],
    // 				  'ENCUADERNACION' => $row['ENCUADERNACION'],
    // 				  'NUMERO_EDICION' => $row['NUMERO_EDICION'],
    // 				  'FORMATO_EJEMPLAR' => $row['FORMATO_EJEMPLAR'],
    // 				  'IDIOMA_EJEMPLAR' => $row['IDIOMA_EJEMPLAR'],
    // 				  'ISBN_EJEMPLAR' => $row['ISBN_EJEMPLAR'],
    // 				  'PAGINAS_EJEMPLAR' => $row['PAGINAS_EJEMPLAR'],
    // 				  'PVP_EJEMPLAR' => $row['PVP_EJEMPLAR'],
    // 				  'LIBRO_DESCRIPCION' => $row['LIBRO_DESCRIPCION'],
    // 				  'PORTADA_EJEMPLAR' => $row['PORTADA_EJEMPLAR'],
    // 				  'ID_AUTOR' => $row['ID_AUTOR'],
    // 				  'NOMBRE_EDITORIAL' => $row['NOMBRE_EDITORIAL'],
    // 				  'ID_EDITORIAL_EJEMPLAR' => $row['ID_EDITORIAL_EJEMPLAR'],
    //
    //               ];
    //           }
    //           $con->commit();
    //           return $busqueda;
    //       }catch(PDOException $ex){
    //         //throw new Exception("Error Processing Request", 1); //el inc es para los includes
    //          throw $ex;
    //          $con->rollBack();
    //       }finally{
    //         $con = null;
    //         $stmt = null;
    //       }
    //
    //     }//fin metodo

















}//fin clase
