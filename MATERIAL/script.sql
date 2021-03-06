USE [master]
GO
/****** Object:  Database [CadenaTiendas]    Script Date: 05/04/2017 17:20:06 ******/
CREATE DATABASE [CadenaTiendas]
 CONTAINMENT = NONE
 ON  PRIMARY 
( NAME = N'CadenaTiendas', FILENAME = N'c:\Program Files\Microsoft SQL Server\MSSQL11.SQLEXPRESS\MSSQL\DATA\CadenaTiendas.mdf' , SIZE = 5120KB , MAXSIZE = UNLIMITED, FILEGROWTH = 1024KB )
 LOG ON 
( NAME = N'CadenaTiendas_log', FILENAME = N'c:\Program Files\Microsoft SQL Server\MSSQL11.SQLEXPRESS\MSSQL\DATA\CadenaTiendas_log.ldf' , SIZE = 1024KB , MAXSIZE = 2048GB , FILEGROWTH = 10%)
GO
ALTER DATABASE [CadenaTiendas] SET COMPATIBILITY_LEVEL = 110
GO
IF (1 = FULLTEXTSERVICEPROPERTY('IsFullTextInstalled'))
begin
EXEC [CadenaTiendas].[dbo].[sp_fulltext_database] @action = 'enable'
end
GO
ALTER DATABASE [CadenaTiendas] SET ANSI_NULL_DEFAULT OFF 
GO
ALTER DATABASE [CadenaTiendas] SET ANSI_NULLS OFF 
GO
ALTER DATABASE [CadenaTiendas] SET ANSI_PADDING OFF 
GO
ALTER DATABASE [CadenaTiendas] SET ANSI_WARNINGS OFF 
GO
ALTER DATABASE [CadenaTiendas] SET ARITHABORT OFF 
GO
ALTER DATABASE [CadenaTiendas] SET AUTO_CLOSE OFF 
GO
ALTER DATABASE [CadenaTiendas] SET AUTO_CREATE_STATISTICS ON 
GO
ALTER DATABASE [CadenaTiendas] SET AUTO_SHRINK OFF 
GO
ALTER DATABASE [CadenaTiendas] SET AUTO_UPDATE_STATISTICS ON 
GO
ALTER DATABASE [CadenaTiendas] SET CURSOR_CLOSE_ON_COMMIT OFF 
GO
ALTER DATABASE [CadenaTiendas] SET CURSOR_DEFAULT  GLOBAL 
GO
ALTER DATABASE [CadenaTiendas] SET CONCAT_NULL_YIELDS_NULL OFF 
GO
ALTER DATABASE [CadenaTiendas] SET NUMERIC_ROUNDABORT OFF 
GO
ALTER DATABASE [CadenaTiendas] SET QUOTED_IDENTIFIER OFF 
GO
ALTER DATABASE [CadenaTiendas] SET RECURSIVE_TRIGGERS OFF 
GO
ALTER DATABASE [CadenaTiendas] SET  DISABLE_BROKER 
GO
ALTER DATABASE [CadenaTiendas] SET AUTO_UPDATE_STATISTICS_ASYNC OFF 
GO
ALTER DATABASE [CadenaTiendas] SET DATE_CORRELATION_OPTIMIZATION OFF 
GO
ALTER DATABASE [CadenaTiendas] SET TRUSTWORTHY OFF 
GO
ALTER DATABASE [CadenaTiendas] SET ALLOW_SNAPSHOT_ISOLATION OFF 
GO
ALTER DATABASE [CadenaTiendas] SET PARAMETERIZATION SIMPLE 
GO
ALTER DATABASE [CadenaTiendas] SET READ_COMMITTED_SNAPSHOT OFF 
GO
ALTER DATABASE [CadenaTiendas] SET HONOR_BROKER_PRIORITY OFF 
GO
ALTER DATABASE [CadenaTiendas] SET RECOVERY SIMPLE 
GO
ALTER DATABASE [CadenaTiendas] SET  MULTI_USER 
GO
ALTER DATABASE [CadenaTiendas] SET PAGE_VERIFY CHECKSUM  
GO
ALTER DATABASE [CadenaTiendas] SET DB_CHAINING OFF 
GO
ALTER DATABASE [CadenaTiendas] SET FILESTREAM( NON_TRANSACTED_ACCESS = OFF ) 
GO
ALTER DATABASE [CadenaTiendas] SET TARGET_RECOVERY_TIME = 0 SECONDS 
GO
USE [CadenaTiendas]
GO
/****** Object:  Table [dbo].[almacen]    Script Date: 05/04/2017 17:20:06 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[almacen](
	[idArticulo] [int] NOT NULL,
	[idTienda] [int] NOT NULL,
	[stock] [int] NOT NULL,
 CONSTRAINT [PkAlmacen] PRIMARY KEY CLUSTERED 
(
	[idArticulo] ASC,
	[idTienda] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON) ON [PRIMARY]
) ON [PRIMARY]

GO
/****** Object:  Table [dbo].[articulo]    Script Date: 05/04/2017 17:20:06 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
SET ANSI_PADDING ON
GO
CREATE TABLE [dbo].[articulo](
	[id] [int] IDENTITY(1,1) NOT NULL,
	[nombreCorto] [nvarchar](50) NOT NULL,
	[nombre] [nvarchar](200) NOT NULL,
	[descripcion] [nvarchar](4000) NULL,
	[PVP] [money] NOT NULL,
	[idFamilia] [int] NULL,
	[foto] [varbinary](max) NULL,
 CONSTRAINT [PkArticulo] PRIMARY KEY CLUSTERED 
(
	[id] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON) ON [PRIMARY],
 CONSTRAINT [UNombreCortoArticulo] UNIQUE NONCLUSTERED 
(
	[nombreCorto] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON) ON [PRIMARY]
) ON [PRIMARY] TEXTIMAGE_ON [PRIMARY]

GO
SET ANSI_PADDING OFF
GO
/****** Object:  Table [dbo].[familia]    Script Date: 05/04/2017 17:20:06 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[familia](
	[Id] [int] IDENTITY(1,1) NOT NULL,
	[nombre] [nvarchar](200) NOT NULL,
	[descripcion] [nvarchar](1000) NOT NULL,
 CONSTRAINT [PkFamilia] PRIMARY KEY CLUSTERED 
(
	[Id] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON) ON [PRIMARY]
) ON [PRIMARY]

GO
/****** Object:  Table [dbo].[reseniasArticulo]    Script Date: 05/04/2017 17:20:06 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[reseniasArticulo](
	[idResenia] [int] IDENTITY(1,1) NOT NULL,
	[idArticulo] [int] NOT NULL,
	[nombreArticulo] [nvarchar](50) NOT NULL,
	[fechaResenia] [datetime] NOT NULL,
	[emailResenia] [nvarchar](50) NOT NULL,
	[puntuacion] [int] NOT NULL,
	[comentarios] [nvarchar](50) NOT NULL,
	[modifiedDate] [datetime] NOT NULL,
 CONSTRAINT [PkIdResenia] PRIMARY KEY CLUSTERED 
(
	[idResenia] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON) ON [PRIMARY]
) ON [PRIMARY]

GO
/****** Object:  Table [dbo].[tienda]    Script Date: 05/04/2017 17:20:06 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[tienda](
	[id] [int] IDENTITY(1,1) NOT NULL,
	[nombre] [nvarchar](100) NOT NULL,
	[provincia] [nvarchar](15) NOT NULL,
	[ciudad] [nvarchar](50) NOT NULL,
	[tlfno] [nvarchar](9) NOT NULL,
 CONSTRAINT [PkTienda] PRIMARY KEY CLUSTERED 
(
	[id] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON) ON [PRIMARY]
) ON [PRIMARY]

GO
/****** Object:  Table [dbo].[usuario]    Script Date: 05/04/2017 17:20:06 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[usuario](
	[usuario] [nvarchar](20) NOT NULL,
	[contrasenia] [nvarchar](32) NOT NULL,
 CONSTRAINT [PkUsuario] PRIMARY KEY CLUSTERED 
(
	[usuario] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON) ON [PRIMARY]
) ON [PRIMARY]

GO
ALTER TABLE [dbo].[almacen]  WITH CHECK ADD  CONSTRAINT [FkProductoNAlmacen] FOREIGN KEY([idArticulo])
REFERENCES [dbo].[articulo] ([id])
ON UPDATE CASCADE
GO
ALTER TABLE [dbo].[almacen] CHECK CONSTRAINT [FkProductoNAlmacen]
GO
ALTER TABLE [dbo].[almacen]  WITH CHECK ADD  CONSTRAINT [FkTiendaNAlmacen] FOREIGN KEY([idTienda])
REFERENCES [dbo].[tienda] ([id])
ON UPDATE CASCADE
GO
ALTER TABLE [dbo].[almacen] CHECK CONSTRAINT [FkTiendaNAlmacen]
GO
ALTER TABLE [dbo].[articulo]  WITH CHECK ADD  CONSTRAINT [FkFamiliaNArticulo] FOREIGN KEY([idFamilia])
REFERENCES [dbo].[familia] ([Id])
ON UPDATE CASCADE
GO
ALTER TABLE [dbo].[articulo] CHECK CONSTRAINT [FkFamiliaNArticulo]
GO
ALTER TABLE [dbo].[reseniasArticulo]  WITH CHECK ADD  CONSTRAINT [Fk_IdArticulo] FOREIGN KEY([idArticulo])
REFERENCES [dbo].[articulo] ([id])
GO
ALTER TABLE [dbo].[reseniasArticulo] CHECK CONSTRAINT [Fk_IdArticulo]
GO
USE [master]
GO
ALTER DATABASE [CadenaTiendas] SET  READ_WRITE 
GO
