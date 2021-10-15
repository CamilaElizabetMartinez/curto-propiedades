-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Apr 19, 2017 at 01:16 AM
-- Server version: 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `curto_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `clientes`
--

DROP TABLE IF EXISTS `clientes`;
CREATE TABLE IF NOT EXISTS `clientes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `fecha_creado` datetime DEFAULT NULL,
  `fecha_modificado` datetime DEFAULT NULL,
  `activo` text COLLATE latin1_bin NOT NULL,
  `cliente_name` varchar(255) COLLATE latin1_bin DEFAULT NULL,
  `cliente_user` varchar(50) COLLATE latin1_bin DEFAULT NULL,
  `cliente_password` text COLLATE latin1_bin,
  `cliente_suscrip` text COLLATE latin1_bin,
  PRIMARY KEY (`id`),
  UNIQUE KEY `cliente_user` (`cliente_user`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 COLLATE=latin1_bin AUTO_INCREMENT=35 ;

--
-- Dumping data for table `clientes`
--

INSERT INTO `clientes` (`id`, `fecha_creado`, `fecha_modificado`, `activo`, `cliente_name`, `cliente_user`, `cliente_password`, `cliente_suscrip`) VALUES
(25, '2017-01-13 03:11:45', '2017-02-05 05:15:21', 'S', 'Pablo Ramirez', 'pablo@mail.com', '1234', 'S'),
(26, '2017-02-05 05:14:43', '2017-02-05 05:15:13', 'S', 'Maria', 'maria@mail.com', '1234', 'S'),
(27, NULL, NULL, 'S', 'Nestor', 'nsotlar@gmail.com', '1234', 'S'),
(31, '2017-02-16 03:27:41', NULL, 'S', 'pedro', 'pedro@mail.com', '1234', 'S'),
(32, '2017-02-27 13:09:15', NULL, 'S', 'Florencia Prueba Tenreyro', 'florencia@alonauta.com', 'alonauta', 'S'),
(33, '2017-03-10 15:05:00', NULL, 'S', 'Cristian Martin', 'cristiancurto@hotmail.com', 'clave.123', 'S'),
(34, '2017-04-11 04:19:51', NULL, 'S', 'juan', 'juan@mail.com', NULL, 'S');

-- --------------------------------------------------------

--
-- Table structure for table `clientes_favoritos`
--

DROP TABLE IF EXISTS `clientes_favoritos`;
CREATE TABLE IF NOT EXISTS `clientes_favoritos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `cliente_id` int(11) NOT NULL,
  `propiedad_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 COLLATE=latin1_bin AUTO_INCREMENT=23 ;

--
-- Dumping data for table `clientes_favoritos`
--

INSERT INTO `clientes_favoritos` (`id`, `cliente_id`, `propiedad_id`) VALUES
(5, 25, 2138),
(6, 25, 2147),
(7, 25, 2149),
(8, 26, 2148),
(12, 31, 2122),
(13, 31, 2148),
(17, 31, 2127),
(18, 26, 2149),
(19, 32, 2191),
(21, 27, 2191),
(22, 27, 2231);

-- --------------------------------------------------------

--
-- Table structure for table `desarrollos`
--

DROP TABLE IF EXISTS `desarrollos`;
CREATE TABLE IF NOT EXISTS `desarrollos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `fecha_creado` datetime DEFAULT NULL,
  `fecha_modificado` datetime DEFAULT NULL,
  `activo` text COLLATE latin1_bin NOT NULL,
  `titulo` text COLLATE latin1_bin,
  `descripcion_corta` text COLLATE latin1_bin,
  `descripcion` text COLLATE latin1_bin,
  `sup_cubierta` decimal(10,2) NOT NULL DEFAULT '0.00',
  `sup_total` decimal(10,2) NOT NULL DEFAULT '0.00',
  `cant_habitaciones` int(11) NOT NULL DEFAULT '0',
  `cant_banos` int(11) NOT NULL DEFAULT '0',
  `video_youtube` text COLLATE latin1_bin NOT NULL,
  `video_vimeo` text COLLATE latin1_bin NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 COLLATE=latin1_bin AUTO_INCREMENT=176 ;

--
-- Dumping data for table `desarrollos`
--

INSERT INTO `desarrollos` (`id`, `fecha_creado`, `fecha_modificado`, `activo`, `titulo`, `descripcion_corta`, `descripcion`, `sup_cubierta`, `sup_total`, `cant_habitaciones`, `cant_banos`, `video_youtube`, `video_vimeo`) VALUES
(175, '2017-02-27 13:30:38', '2017-02-28 18:10:23', 'S', 'Las Lorenzas', 'Oportunidad única de inversión: Fideicomiso al costo totalmente en pesos', '<p>"Las Lorenzas" es un emprendimiento inmobiliario al costo en pesos de 10 pisos en la zona residencial mas exclusiva del corazón de Ezeiza con comodidades excepcionales:</p><p>o<span class="Apple-tab-span" style="white-space:pre">	</span>Terraza mirador<br><span style="font-size: 1rem; letter-spacing: 0px; word-spacing: normal;">o</span><span class="Apple-tab-span" style="font-size: 1rem; letter-spacing: 0px; word-spacing: normal; white-space: pre;">	</span><span style="font-size: 1rem; letter-spacing: 0px; word-spacing: normal;">Espejo de agua<br></span><span style="font-size: 1rem; letter-spacing: 0px; word-spacing: normal;">o</span><span class="Apple-tab-span" style="font-size: 1rem; letter-spacing: 0px; word-spacing: normal; white-space: pre;">	</span><span style="font-size: 1rem; letter-spacing: 0px; word-spacing: normal;">Parrillas<br></span><span style="font-size: 1rem; letter-spacing: 0px; word-spacing: normal;">o</span><span class="Apple-tab-span" style="font-size: 1rem; letter-spacing: 0px; word-spacing: normal; white-space: pre;">	</span><span style="font-size: 1rem; letter-spacing: 0px; word-spacing: normal;">Lavadero<br></span><span style="font-size: 1rem; letter-spacing: 0px; word-spacing: normal;">o</span><span class="Apple-tab-span" style="font-size: 1rem; letter-spacing: 0px; word-spacing: normal; white-space: pre;">	</span><span style="font-size: 1rem; letter-spacing: 0px; word-spacing: normal;">Bauleras<br></span><span style="font-size: 1rem; letter-spacing: 0px; word-spacing: normal;">o</span><span class="Apple-tab-span" style="font-size: 1rem; letter-spacing: 0px; word-spacing: normal; white-space: pre;">	</span><span style="font-size: 1rem; letter-spacing: 0px; word-spacing: normal;">Dos ascensores con capacidad para seis personas de ultima generacion</span></p><div><br></div>', '0.00', '0.00', 0, 0, 'https://www.youtube.com/watch?v=PPGap77sXQs&feature=youtu.be', '0');

-- --------------------------------------------------------

--
-- Table structure for table `propiedades`
--

DROP TABLE IF EXISTS `propiedades`;
CREATE TABLE IF NOT EXISTS `propiedades` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `fecha_creado` datetime DEFAULT NULL,
  `fecha_modificado` datetime DEFAULT NULL,
  `activo` text COLLATE latin1_bin NOT NULL,
  `profit_id` int(11) NOT NULL DEFAULT '1',
  `tipo_propiedad` int(11) NOT NULL DEFAULT '0',
  `pais` text COLLATE latin1_bin NOT NULL,
  `provincia` text COLLATE latin1_bin NOT NULL,
  `localidad` text COLLATE latin1_bin NOT NULL,
  `zona` text COLLATE latin1_bin NOT NULL,
  `orientacion` text COLLATE latin1_bin NOT NULL,
  `ubicacion` text COLLATE latin1_bin NOT NULL,
  `loc_lat` decimal(10,5) NOT NULL DEFAULT '0.00000',
  `loc_long` decimal(10,5) DEFAULT '0.00000',
  `en_venta` text COLLATE latin1_bin NOT NULL,
  `precio_venta` decimal(10,2) NOT NULL DEFAULT '0.00',
  `moneda_venta_id` int(11) NOT NULL DEFAULT '0',
  `en_alquiler` text COLLATE latin1_bin NOT NULL,
  `precio_alquiler` decimal(10,2) NOT NULL DEFAULT '0.00',
  `moneda_alquiler_id` int(11) NOT NULL DEFAULT '0',
  `sup_cubierta` decimal(10,2) NOT NULL DEFAULT '0.00',
  `sup_total` decimal(10,2) NOT NULL DEFAULT '0.00',
  `cant_habitaciones` int(11) NOT NULL DEFAULT '0',
  `cant_banos` int(11) NOT NULL DEFAULT '0',
  `cant_cocheras` int(11) NOT NULL DEFAULT '0',
  `antiguedad` int(11) NOT NULL DEFAULT '0',
  `titulo_es` text COLLATE latin1_bin,
  `descripcion_es` text COLLATE latin1_bin,
  `titulo_en` text COLLATE latin1_bin,
  `descripcion_en` text COLLATE latin1_bin,
  `titulo_pt` text COLLATE latin1_bin,
  `descripcion_pt` text COLLATE latin1_bin,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 COLLATE=latin1_bin AUTO_INCREMENT=2237 ;

--
-- Dumping data for table `propiedades`
--

INSERT INTO `propiedades` (`id`, `fecha_creado`, `fecha_modificado`, `activo`, `profit_id`, `tipo_propiedad`, `pais`, `provincia`, `localidad`, `zona`, `orientacion`, `ubicacion`, `loc_lat`, `loc_long`, `en_venta`, `precio_venta`, `moneda_venta_id`, `en_alquiler`, `precio_alquiler`, `moneda_alquiler_id`, `sup_cubierta`, `sup_total`, `cant_habitaciones`, `cant_banos`, `cant_cocheras`, `antiguedad`, `titulo_es`, `descripcion_es`, `titulo_en`, `descripcion_en`, `titulo_pt`, `descripcion_pt`) VALUES
(2165, '2017-02-26 00:25:53', '2017-02-26 00:28:36', 'S', 247, 3, 'Argentina', 'Buenos Aires', 'Monte Grande', 'Centro', 'Noreste', 'Frente', '-34.81215', '-58.46336', 'N', '0.00', 0, 'S', '8000.00', 5, '75.00', '400.00', 2, 0, 1, 0, 'Monte Grande, Arana 463', 'Portón de rejas al frente, acceso por garaje a cocina amoblada con muebles bajo mesada y alacenas. No incluye artefacto de cocina. Comedor con barra pasaplatos. Distribuidor amplio a los dosrmitorios, con piso de parquet y placard emportado. Baño completo. Detalles a reparar. Lavadero cubierto, despensero. Parrilla y fondo libre. Inmejorable ubicación, no te pierdas esta oportunidad! Llamanos!', '...', '...', '...', '...'),
(2166, '2017-02-26 00:26:24', '2017-02-26 00:27:47', 'S', 60, 4, 'Argentina', 'Buenos Aires', 'Ezeiza', 'Sin Asignar', 'Sureste', 'Frente', '-34.85614', '-58.52468', 'N', '0.00', 0, 'S', '4000.00', 5, '29.00', '36.00', 0, 1, 0, 0, 'Ezeiza, José M. Ezeiza 109', 'Oficina a estrenar en el corazón de Ezeiza!!! A metros de la Municipalidad, sobre José M. Ezeiza esquina RN 205.\nIntegrada por un ambiente único con kitchenette integrada, muebles bajo mesada y alacenas. Anafe y termotanque electrico. Balcón a José M. Ezeiza. Muy luminosa.\nApto profesional/vivienda! Imperdible!!', '...', '...', '...', '...'),
(2167, '2017-02-26 00:26:24', '2017-03-15 01:48:04', 'S', 61, 4, 'Argentina', 'Buenos Aires', 'Ezeiza', 'Sin Asignar', 'Noroeste', 'Frente', '-34.85614', '-58.52468', 'N', '0.00', 0, 'S', '4200.00', 5, '37.00', '38.00', 0, 1, 0, 0, 'Ezeiza, José M. Ezeiza 109', 'Oficina/Monoambiente a estrenar con vistas a la Municipalidad de Ezeiza. A metros de la estación de trenes. Esquina RN 205. Muy luminoso. \nIntegrado por un ambiente único con kitchenette, termotanque  y anafe electrico.\nBalcón semicerrado. \nApto profesional/Vivienda', 'Ezeiza, José M. Ezeiza 109', '', 'Ezeiza, José M. Ezeiza 109', ''),
(2168, '2017-02-26 00:26:25', '2017-03-23 03:05:06', 'S', 62, 4, 'Argentina', 'Buenos Aires', 'Ezeiza', 'Sin Asignar', 'Noroeste', 'Frente', '-34.85614', '-58.52468', 'N', '0.00', 0, 'S', '4200.00', 5, '39.00', '40.00', 0, 0, 0, 0, 'Ezeiza, José M. Ezeiza 109', 'Oficina/Monoambiente a estrenar con vistas a la Municipalidad de Ezeiza. A metros de la estación de trenes. Esquina RN 205. Muy luminoso. \nIntegrado por un ambiente único con kitchenette, termotanque  y anafe electrico.\nBalcón semicerrado. \nApto profesional/Vivienda', 'Ezeiza, José M. Ezeiza 109', '', 'Ezeiza, José M. Ezeiza 109', ''),
(2169, '2017-02-26 00:26:25', '2017-03-23 03:05:06', 'S', 64, 4, 'Argentina', 'Buenos Aires', 'Ezeiza', 'Sin Asignar', 'Noroeste', 'Frente', '-34.85614', '-58.52468', 'N', '0.00', 0, 'S', '4000.00', 5, '0.00', '39.00', 0, 0, 0, 0, 'Ezeiza, José M. Ezeiza 109', 'Oficina/Monoambiente a estrenar con vistas a la Municipalidad de Ezeiza. A metros de la estación de trenes. Esquina RN 205. Muy luminoso. \nIntegrado por un ambiente único con kitchenette, termotanque  y anafe electrico.\nAmplia terraza - Balcón semicerrada. \nSUM y Parrilla. Simplemente GENIAL!\nApto profesional/Vivienda', 'Ezeiza, José M. Ezeiza 109', '', 'Ezeiza, José M. Ezeiza 109', ''),
(2170, '2017-02-26 00:26:25', '2017-03-23 03:05:06', 'S', 81, 4, 'Argentina', 'Buenos Aires', 'Alejandro Petion, Cañuelas', 'Sin Asignar', 'Este', 'Interno', '-34.97775', '-58.66263', 'S', '54200.00', 6, 'N', '0.00', 0, '834.00', '834.00', 0, 0, 0, 0, 'Alejandro Petion, Cañuelas, Mariano Acosta 717', 'LOMAS DE PETION - EXCELENTE OPORTUNIDAD DE INVERSIÓN EN EXCLUSIVAS QUINTAS URBANAS - Una propuesta inigualable a 40 minutos del Obelisco y 15'' del Aeropuerto Internacional de Ezeiza, entre la Au. Ezeiza Cañuelas y la Ruta Nacional 205\nDisfrutá del aire puro, libre de ruidos e incomodidades en el sector Polista por excelencia de Buenos Aires, con acceso por asfalto y bajada directa de autopista. \nLOTE DE 834 M², - CALLES CIRCULANTES ASFALTADAS Y AREAS DE SERVICIOS -ILUMINACIÓN VIAL - CERCO PERIMETRAL OLIMPICO - SEGURIDAD - ACCESO INDEPENDIENTE A PROVEEDORES  - SOBRE UN PREDIO DE 40 HAS CON ESPACIOS VERDES, AREAS DE RECREACION Y FORESTACIÓN PROPIA DE LA ZONA - A METROS DEL CENTRO COMERCIAL, ASISTENCIAL Y DESTACAMENTO POLICIAL DE PETIÓN Y COLEGIO BILINGÜE - AMPLIA FINANANCIACIÓN - 35% AL BOLETO + CUOTAS -  LA OPCIÓN PARA MEJORAR TU CALIDAD DE VIDA, LOMAS DE PETION EL LUGAR PARA TU HOGAR.', 'Alejandro Petion, Cañuelas, Mariano Acosta 717', 'LOMAS DE PETION - EXCELLENT INVESTMENT OPPORTUNITY IN EXCLUSIVE URBAN FACILITIES - An unbeatable proposal 40 minutes from the Obelisk and 15 ''from the International Airport of Ezeiza, between the Au. Ezeiza Cañuelas and the National Route 205\nEnjoy the pure air, free of noise and discomfort in the sector Polista par excellence of Buenos Aires, with access by asphalt and direct descent of motorway.\nLOT OF 834 M², - ASPHALT CIRCULATING STREETS AND AREAS OF SERVICES - ROAD LIGHTING - OLIMPICAL PERIMETER FENCE - SECURITY - INDEPENDENT ACCESS TO SUPPLIERS - ABOUT A PRETTY OF 40 HAS WITH GREEN SPACES, AREAS OF RECREATION AND OWN AREA OF THE AREA - TO METERS OF THE COMMERCIAL CENTER, ASSISTANCE AND POLITICAL DEVELOPMENT OF PETIÓN AND BILINGUAL SCHOOL - LARGE FINANANCING - 35% TO THE TICKET + QUOTES - THE OPTION TO IMPROVE YOUR QUALITY OF LIFE, LOMAS DE PETION THE PLACE FOR YOUR HOME.', 'Alejandro Petion, Cañuelas, Mariano Acosta 717', 'Lomas de Petion - OPORTUNIDADE EXCELENTE INVESTIMENTO EM EXCLUSIVO QUINTAS URBANA - A únicos 40 minutos do Obelisco e do Aeroporto Internacional 15 ''Ezeiza entre a proposta Au. Ezeiza Cañuelas e Estrada Nacional 205\nAproveite o ar fresco, livre de ruído e inconveniência jogador de pólo na indústria de excelência em Buenos Aires, com acesso por asfalto e estrada descendência direta.\nLOTE DE 834 M² - pavimentadas ruas e áreas de serviços atuais -Iluminação Road - cerca do perímetro olímpico - SEGURANÇA - Fornecedores de acesso independente - em uma área de 40 TEM COM ESPAÇO VERDE, área de lazer e FLORESTAL ZONE PRÓPRIO - A METROS The Mall, CUIDADOS E POLÍCIA tASK Petion e Escola Bilíngüe - WIDE FINANANCIACIÓN - 35% + Ticket to QUOTAS - opção para melhorar sua qualidade de vida, Lomas de Pétion LUGAR PARA SUA CASA.'),
(2171, '2017-02-26 00:26:25', '2017-03-23 03:05:07', 'S', 87, 4, 'Argentina', 'Buenos Aires', 'Ezeiza', 'Sin Asignar', 'Sin Informar', 'Frente', '-34.85614', '-58.52468', 'N', '0.00', 0, 'S', '3500.00', 5, '33.00', '34.00', 0, 0, 0, 0, 'Ezeiza, J.m. Ezeiza 109', 'Oficin en primera planta, ubicada en la esquina de J.M. Ezeiza y RN 205. A metros de la Municipalidad y Estación de Trenes de Ezeiza. Muy luminosa con balcón en el corazón de Ezeiza - Baño completo con bañera. Además el edificio ofrece Salón de Usos Múltiples y Terraza Libre para organización de eventos.\n', 'Ezeiza, J.m. Ezeiza 109', '', 'Ezeiza, J.m. Ezeiza 109', ''),
(2172, '2017-02-26 00:26:25', '2017-03-23 03:05:07', 'S', 109, 4, 'Argentina', 'Buenos Aires', 'Santa Teresita', 'Santa Teresita', 'Sin Informar', 'Frente', '-36.54680', '-56.68864', 'S', '60000.00', 6, 'N', '0.00', 0, '0.00', '49.00', 1, 0, 0, 0, 'Santa Teresita, Avenida Costarena  1633', 'Excelente departamento  en santa teresita, partido de la costa. Inmejorable ubicación a solo dos cuadras de la peatonal. El departamento esta de frente al  mar y cuenta con un amplio living-comedor, cocina completa con muebles bajo y sobre mesada. La habitación principal tiene balcón con vista al mar. El edificio cuenta con un quincho cubierto en la terraza donde se pueden realizar eventos para 30 personas . Muy buena oportunidad, no dudes en consultar!!!', 'Santa Teresita, Avenida Costarena  1633', '', 'Santa Teresita, Avenida Costarena  1633', ''),
(2173, '2017-02-26 00:26:26', '2017-03-23 03:05:07', 'S', 110, 4, 'Argentina', 'Buenos Aires', 'Monte Grande', 'Centro', 'Sin Informar', 'Sin Informar', '-34.81855', '-58.45769', 'S', '1300000.00', 5, 'N', '0.00', 0, '45.00', '60.00', 1, 1, 2, 0, 'Monte Grande, Pedro Reta 740', 'Consorcio de construccion al costo- Foresta Villagio.\nDepartamentos 2 ambientes desde 54 m² en Monte Grande - Materiales de 1º calidad- Anticipo y cuotas en PESOS!! Consultar financiacion!!!!!', 'Monte Grande, Pedro Reta 740', '', 'Monte Grande, Pedro Reta 740', ''),
(2174, '2017-02-26 00:26:26', '2017-03-23 03:05:07', 'S', 111, 4, 'Argentina', 'Buenos Aires', 'Monte Grande', 'Centro', 'Sin Informar', 'Sin Informar', '-34.81855', '-58.45769', 'S', '1256000.00', 5, 'N', '0.00', 0, '45.00', '58.00', 1, 1, 2, 0, 'Monte Grande, Pedro Reta  740', 'Consorcio de construccion al costo- Foresta Villagio.\nDepartamentos 2 ambientes desde 54 m² en Monte Grande - Materiales de 1º calidad- Anticipo y cuotas en PESOS!! Consultar financiacion!!!!!', 'Monte Grande, Pedro Reta  740', '', 'Monte Grande, Pedro Reta  740', ''),
(2175, '2017-02-26 00:26:26', '2017-03-23 03:05:08', 'S', 112, 4, 'Argentina', 'Buenos Aires', 'Monte Grande', 'Centro', 'Sin Informar', 'Sin Informar', '-34.81855', '-58.45769', 'S', '1234000.00', 5, 'N', '0.00', 0, '48.00', '57.00', 0, 0, 2, 0, 'Monte Grande, Pedro Reta  740', 'Consorcio de construccion al costo- Foresta Villagio.\nDepartamentos 2 ambientes desde 54 m² en Monte Grande - Materiales de 1º calidad- Anticipo y cuotas en PESOS!! Consultar financiacion!!!!!', 'Monte Grande, Pedro Reta  740', '', 'Monte Grande, Pedro Reta  740', ''),
(2176, '2017-02-26 00:26:26', '2017-03-23 03:05:08', 'S', 113, 4, 'Argentina', 'Buenos Aires', 'Monte Grande', 'Centro', 'Sin Informar', 'Sin Informar', '-34.81855', '-58.45769', 'S', '1170000.00', 5, 'N', '0.00', 0, '45.00', '54.00', 1, 1, 2, 0, 'Monte Grande, Pedro Reta 740', 'Consorcio de construccion al costo- Foresta Villagio.\nDepartamentos 2 ambientes desde 54 m² en Monte Grande - Materiales de 1º calidad- Anticipo y cuotas en PESOS!! Consultar financiacion!!!!!', 'Monte Grande, Pedro Reta 740', '', 'Monte Grande, Pedro Reta 740', ''),
(2177, '2017-02-26 00:26:27', '2017-03-23 03:05:08', 'S', 122, 4, 'Argentina', 'Buenos Aires', 'Ezeiza', 'Sin Asignar', 'Sin Informar', 'Sin Informar', '-34.85419', '-58.52565', 'S', '80000.00', 6, 'N', '0.00', 0, '0.00', '0.00', 0, 0, 0, 0, 'Ezeiza, Gral. Urquiza  111', 'Departamento a la venta en edificio Terrazas de Ezeiza. Departamento de 3 ambientes de 58 m², compuesto por living con pisos cerámicos, ventilación e iluminación natural por puerta balcón de dos hojas abatibles y puerta vidriada al balcón es esquina con vista a la plaza y Municipalidad de Ezeiza. Pequeño balcón terraza sobre vista lateral. Cocina completa integrada con muebles bajo mesada de puertas abatibles y cajonera, espacio bajo mesada para lavarropas y artefacto de cocina de cuatro elementos con horno a gas, termo tanque de 75 litros marca Ecotermo. Mobiliario en espejo a desayunador, mesada de granito gris con doble bacha y grifería tipo mono comando, con muebles bajo mesada en melanina color wengue. Baño completo con bañera, inodoro con depósito de agua por mochila accesoria. Lavatorio suspendido sobre granito gris con espejo empotrado y accesorios metálicos, toilette de recepción con inodoro con depósito de agua por mochila accesoria y lavatorio suspendido sobre granito color gris. Dos dormitorios con pisos cerámicos y placares completos de hojas correderas, ventilación e iluminación natural.\n', 'Ezeiza, Gral. Urquiza  111', '', 'Ezeiza, Gral. Urquiza  111', ''),
(2178, '2017-02-26 00:26:27', '2017-03-23 03:05:08', 'S', 123, 4, 'Argentina', 'Buenos Aires', 'Monte Grande', 'Centro', 'Sin Informar', 'Sin Informar', '-34.81539', '-58.47285', 'N', '0.00', 0, 'S', '6500.00', 5, '0.00', '0.00', 0, 0, 2, 0, 'Monte Grande, Maximo Paz  215', 'Excelente loft en Monte Grande, a tan solo 1 cuadra de la estacion de trenes de Monte Grande. Compuesto por un ambiente muy amplio con cocina equipada con muebles bajo mesada y alacena, artefacto de cocina y mesada de granito. Puerta corrediza con acceso a balcon. Acceso a nivel superior por escalera metalica, dormitorio con placard. Baño completo. ', 'Monte Grande, Maximo Paz  215', '', 'Monte Grande, Maximo Paz  215', ''),
(2179, '2017-02-26 00:26:27', '2017-03-23 03:05:09', 'S', 137, 4, 'Argentina', 'Buenos Aires', 'Ezeiza', 'Sin Asignar', 'Noreste', 'Frente', '-34.85500', '-58.51783', 'S', '70588.00', 6, 'N', '0.00', 0, '35.00', '44.00', 0, 1, 2, 0, 'Ezeiza, Lorenza Zenavilla 344', 'Ambiente único con kitchenette integrada, baño completo y amplio balcón.\n•	Pisos de cerámica esmaltada de 1ra calidad en todos los ambientes.\n•	Baño y cocina con revestimiento en cerámica esmaltada.\n•	Artefactos sanitarios de losa blanca en baños marca FV o similar.\n•	Línea de grifería marca FV o similar.\n•	Mueble de cocina a medida con alacena y bajo mesada realizados en melanina de 1ra calidad y mesadas graníticas con doble bacha de acero inoxidable y herrajes de 1ra calidad.\n•	Balcones terrazas de prácticas dimensiones con Baranda y estructura metálica.\n•	Palieres con piso de micropiso o cerámica esmaltada.\n•	Instalación para equipos de climatización tipo Split frío/calor en ambientes principales y dormitorios, \n•	Conexión de TV y TE.\n•	Agua caliente central,\n•	Cañería de agua fría y caliente realizadas en termo-fusión.\n•	Revoques en Paredes y cielorrasos en yeso. \n•	Puertas interiores con marco de chapa con hojas de mdf pintadas blancas.\n•	Carpintería exterior de aluminio.\n•	Frente de placard integral en melamina altura piso techo\n', 'Ezeiza, Lorenza Zenavilla 344', '', 'Ezeiza, Lorenza Zenavilla 344', ''),
(2180, '2017-02-26 00:26:28', '2017-03-23 03:05:09', 'S', 139, 4, 'Argentina', 'Buenos Aires', 'Ezeiza', 'Sin Asignar', 'Noreste', 'Frente', '-34.85500', '-58.51783', 'S', '102470.00', 6, 'N', '0.00', 0, '61.00', '70.00', 2, 1, 2, 0, 'Ezeiza, Lorenza Zenavilla 344', 'LAS LORENZAS ES UN EMPRENDIMIENTO INMOBILIARIO AL COSTO EN PESOS DE 10 PISOS EN LA ZONA RESIDENCIAL MAS EXCLUSIVA DEL CORAZON DE EZEIZA CON COMODIDADES EXCEPCIONALES:\n•	TERRAZA MIRADOR\n•	ESPEJO DE AGUA\n•	PARRILLAS\n•	LAVADERO\n•	BAULERAS\n•	DOS ASCENSORES CON CAPACIDAD PARA SEIS PERSONAS DE ULTIMA GENERACION\nES LA OPORTUNIDAD QUE ESTABAS BUSCANDO CON UN ANTICIPO Y UNA AMPLIA FINANCIACION DE HASTA 24  CUOTAS (INDEXADAS POR LA CAC)\n\nEs  un emprendimiento inmobiliario al costo en pesos que brinda DISEÑO CALIDAD Y CONFORT, como la mejor forma de INVERSION. \n\nGENERALES\n\n•	48 Unidades de viviendas, distribuidas en dos bloques de 3 unidades cada uno por planta.\n•	24 cocheras cubiertas opcionales en planta baja y 24 cocheras cubiertas y semicubiertas opcionales en primer piso.\n•	Hall de entrada con detalles de categoría.\n•	Frente vidriado y puerta de vidrio templado blindex o similar con carpintería metálica. \n•	2 ascensores con puertas automáticas en todos los pisos, de última generación. \n•	Portón de acceso vehicular automático.\n•	Iluminación de planta y palieres de todo el edificio con luminarias de bajo consumo.\n•	Palieres con piso de micropiso o cerámico.\n•	Iluminación de emergencia en todas las plantas. \n•	Escalera de incendio, baranda central, pasamanos y puerta homologada.\n•	Bauleras  ubicadas en el primer piso, cantidad 48 las medidas son 0,95 x 0,75 x 1,30 m \n•	Portero eléctrico en acceso de Planta Baja,\n•	Usos de materiales nobles en exterior: revoques cementicios y hormigón de bajo mantenimiento.\n•	Sala de medidores Gas y Electricidad PB en el acceso vehicular.\n\nAMENITIES\n\n•	Toilette de cortesía, con ante baño, con  acceso desde el SUM del edificio. \n•	SUM en Terraza Mirador.\n•	Terraza con Solarium y Parrilla.\n•	Espejo de Agua. \n•	Lavadero.\nUNIDADES FUNCIONALES\n\n•	Departamentos de 1, 2 ,3 ambientes por planta.\n•	Pisos de cerámica esmaltada de 1ra calidad en todos los ambientes.\n•	Baño y cocina con revestimiento en cerámica esmaltada.\n•	Artefactos sanitarios de losa blanca en baños marca FV o similar.\n•	Línea de grifería marca FV o similar.\n•	Mueble de cocina a medida con alacena y bajo mesada realizados en melanina de 1ra calidad y mesadas graníticas con doble bacha de acero inoxidable y herrajes de 1ra calidad.\n•	Balcones terrazas de prácticas dimensiones con Baranda y estructura metálica.\n•	Palieres con piso de micropiso o cerámica esmaltada.\n•	Instalación para equipos de climatización tipo Split frío/calor en ambientes principales y dormitorios, \n•	Conexión de TV y TE.\n•	Agua caliente central,\n•	Cañería de agua fría y caliente realizadas en termo-fusión.\n•	Revoques en Paredes y cielorrasos en yeso. \n•	Puertas interiores con marco de chapa con hojas de mdf pintadas blancas.\n•	Carpintería exterior de aluminio.\n•	Frente de placard integral en melamina altura piso techo.\n', 'Ezeiza, Lorenza Zenavilla 344', '', 'Ezeiza, Lorenza Zenavilla 344', ''),
(2181, '2017-02-26 00:26:28', '2017-03-23 03:05:10', 'S', 141, 4, 'Argentina', 'Buenos Aires', 'Ezeiza', 'Sin Asignar', 'Sureste', 'Contrafrente', '-34.85500', '-58.51783', 'S', '82184.00', 6, 'N', '0.00', 0, '42.00', '59.00', 1, 1, 2, 0, 'Ezeiza, Lorenza Zenavilla 344', 'LAS LORENZAS ES UN EMPRENDIMIENTO INMOBILIARIO AL COSTO EN PESOS DE 10 PISOS EN LA ZONA RESIDENCIAL MAS EXCLUSIVA DEL CORAZON DE EZEIZA CON COMODIDADES EXCEPCIONALES:\n•	TERRAZA MIRADOR\n•	ESPEJO DE AGUA\n•	PARRILLAS\n•	LAVADERO\n•	BAULERAS\n•	DOS ASCENSORES CON CAPACIDAD PARA SEIS PERSONAS DE ULTIMA GENERACION\nES LA OPORTUNIDAD QUE ESTABAS BUSCANDO CON UN ANTICIPO Y UNA AMPLIA FINANCIACION DE HASTA 24  CUOTAS (INDEXADAS POR LA CAC)\n\nEs  un emprendimiento inmobiliario al costo en pesos que brinda DISEÑO CALIDAD Y CONFORT, como la mejor forma de INVERSION. \n\nGENERALES\n\n•	48 Unidades de viviendas, distribuidas en dos bloques de 3 unidades cada uno por planta.\n•	24 cocheras cubiertas opcionales en planta baja y 24 cocheras cubiertas y semicubiertas opcionales en primer piso.\n•	Hall de entrada con detalles de categoría.\n•	Frente vidriado y puerta de vidrio templado blindex o similar con carpintería metálica. \n•	2 ascensores con puertas automáticas en todos los pisos, de última generación. \n•	Portón de acceso vehicular automático.\n•	Iluminación de planta y palieres de todo el edificio con luminarias de bajo consumo.\n•	Palieres con piso de micropiso o cerámico.\n•	Iluminación de emergencia en todas las plantas. \n•	Escalera de incendio, baranda central, pasamanos y puerta homologada.\n•	Bauleras  ubicadas en el primer piso, cantidad 48 las medidas son 0,95 x 0,75 x 1,30 m \n•	Portero eléctrico en acceso de Planta Baja,\n•	Usos de materiales nobles en exterior: revoques cementicios y hormigón de bajo mantenimiento.\n•	Sala de medidores Gas y Electricidad PB en el acceso vehicular.\n\nAMENITIES\n\n•	Toilette de cortesía, con ante baño, con  acceso desde el SUM del edificio. \n•	SUM en Terraza Mirador.\n•	Terraza con Solarium y Parrilla.\n•	Espejo de Agua. \n•	Lavadero.\nUNIDADES FUNCIONALES\n\n•	Departamentos de 1, 2 ,3 ambientes por planta.\n•	Pisos de cerámica esmaltada de 1ra calidad en todos los ambientes.\n•	Baño y cocina con revestimiento en cerámica esmaltada.\n•	Artefactos sanitarios de losa blanca en baños marca FV o similar.\n•	Línea de grifería marca FV o similar.\n•	Mueble de cocina a medida con alacena y bajo mesada realizados en melanina de 1ra calidad y mesadas graníticas con doble bacha de acero inoxidable y herrajes de 1ra calidad.\n•	Balcones terrazas de prácticas dimensiones con Baranda y estructura metálica.\n•	Palieres con piso de micropiso o cerámica esmaltada.\n•	Instalación para equipos de climatización tipo Split frío/calor en ambientes principales y dormitorios, \n•	Conexión de TV y TE.\n•	Agua caliente central,\n•	Cañería de agua fría y caliente realizadas en termo-fusión.\n•	Revoques en Paredes y cielorrasos en yeso. \n•	Puertas interiores con marco de chapa con hojas de mdf pintadas blancas.\n•	Carpintería exterior de aluminio.\n•	Frente de placard integral en melamina altura piso techo.\n', 'Ezeiza, Lorenza Zenavilla 344', '', 'Ezeiza, Lorenza Zenavilla 344', ''),
(2182, '2017-02-26 00:26:28', '2017-03-23 03:05:10', 'S', 142, 4, 'Argentina', 'Buenos Aires', 'Ezeiza', 'Sin Asignar', 'Sureste', 'Contrafrente', '-34.85500', '-58.51783', 'S', '104358.00', 6, 'N', '0.00', 0, '61.00', '70.00', 2, 1, 2, 0, 'Ezeiza, Lorenza Zenavilla 344', 'LAS LORENZAS ES UN EMPRENDIMIENTO INMOBILIARIO AL COSTO EN PESOS DE 10 PISOS EN LA ZONA RESIDENCIAL MAS EXCLUSIVA DEL CORAZON DE EZEIZA CON COMODIDADES EXCEPCIONALES:\n•	TERRAZA MIRADOR\n•	ESPEJO DE AGUA\n•	PARRILLAS\n•	LAVADERO\n•	BAULERAS\n•	DOS ASCENSORES CON CAPACIDAD PARA SEIS PERSONAS DE ULTIMA GENERACION\nES LA OPORTUNIDAD QUE ESTABAS BUSCANDO CON UN ANTICIPO Y UNA AMPLIA FINANCIACION DE HASTA 24  CUOTAS (INDEXADAS POR LA CAC)\n\nEs  un emprendimiento inmobiliario al costo en pesos que brinda DISEÑO CALIDAD Y CONFORT, como la mejor forma de INVERSION. \n\nGENERALES\n\n•	48 Unidades de viviendas, distribuidas en dos bloques de 3 unidades cada uno por planta.\n•	24 cocheras cubiertas opcionales en planta baja y 24 cocheras cubiertas y semicubiertas opcionales en primer piso.\n•	Hall de entrada con detalles de categoría.\n•	Frente vidriado y puerta de vidrio templado blindex o similar con carpintería metálica. \n•	2 ascensores con puertas automáticas en todos los pisos, de última generación. \n•	Portón de acceso vehicular automático.\n•	Iluminación de planta y palieres de todo el edificio con luminarias de bajo consumo.\n•	Palieres con piso de micropiso o cerámico.\n•	Iluminación de emergencia en todas las plantas. \n•	Escalera de incendio, baranda central, pasamanos y puerta homologada.\n•	Bauleras  ubicadas en el primer piso, cantidad 48 las medidas son 0,95 x 0,75 x 1,30 m \n•	Portero eléctrico en acceso de Planta Baja,\n•	Usos de materiales nobles en exterior: revoques cementicios y hormigón de bajo mantenimiento.\n•	Sala de medidores Gas y Electricidad PB en el acceso vehicular.\n\nAMENITIES\n\n•	Toilette de cortesía, con ante baño, con  acceso desde el SUM del edificio. \n•	SUM en Terraza Mirador.\n•	Terraza con Solarium y Parrilla.\n•	Espejo de Agua. \n•	Lavadero.\nUNIDADES FUNCIONALES\n\n•	Departamentos de 1, 2 ,3 ambientes por planta.\n•	Pisos de cerámica esmaltada de 1ra calidad en todos los ambientes.\n•	Baño y cocina con revestimiento en cerámica esmaltada.\n•	Artefactos sanitarios de losa blanca en baños marca FV o similar.\n•	Línea de grifería marca FV o similar.\n•	Mueble de cocina a medida con alacena y bajo mesada realizados en melanina de 1ra calidad y mesadas graníticas con doble bacha de acero inoxidable y herrajes de 1ra calidad.\n•	Balcones terrazas de prácticas dimensiones con Baranda y estructura metálica.\n•	Palieres con piso de micropiso o cerámica esmaltada.\n•	Instalación para equipos de climatización tipo Split frío/calor en ambientes principales y dormitorios, \n•	Conexión de TV y TE.\n•	Agua caliente central,\n•	Cañería de agua fría y caliente realizadas en termo-fusión.\n•	Revoques en Paredes y cielorrasos en yeso. \n•	Puertas interiores con marco de chapa con hojas de mdf pintadas blancas.\n•	Carpintería exterior de aluminio.\n•	Frente de placard integral en melamina altura piso techo.\n', 'Ezeiza, Lorenza Zenavilla 344', '', 'Ezeiza, Lorenza Zenavilla 344', ''),
(2183, '2017-02-26 00:26:28', '2017-03-23 03:05:10', 'S', 143, 4, 'Argentina', 'Buenos Aires', 'Ezeiza', 'Sin Asignar', 'Noreste', 'Frente', '-34.85500', '-58.51783', 'S', '70543.00', 6, 'N', '0.00', 0, '35.00', '40.00', 0, 1, 2, 0, 'Ezeiza, Lorenza Zenavilla 344', 'Ambiente único con kitchenette integrada, baño completo y amplio balcón.\n•	Pisos de cerámica esmaltada de 1ra calidad en todos los ambientes.\n•	Baño y cocina con revestimiento en cerámica esmaltada.\n•	Artefactos sanitarios de losa blanca en baños marca FV o similar.\n•	Línea de grifería marca FV o similar.\n•	Mueble de cocina a medida con alacena y bajo mesada realizados en melanina de 1ra calidad y mesadas graníticas con doble bacha de acero inoxidable y herrajes de 1ra calidad.\n•	Balcones terrazas de prácticas dimensiones con Baranda y estructura metálica.\n•	Palieres con piso de micropiso o cerámica esmaltada.\n•	Instalación para equipos de climatización tipo Split frío/calor en ambientes principales y dormitorios, \n•	Conexión de TV y TE.\n•	Agua caliente central,\n•	Cañería de agua fría y caliente realizadas en termo-fusión.\n•	Revoques en Paredes y cielorrasos en yeso. \n•	Puertas interiores con marco de chapa con hojas de mdf pintadas blancas.\n•	Carpintería exterior de aluminio.\n•	Frente de placard integral en melamina altura piso techo\n', 'Ezeiza, Lorenza Zenavilla 344', '', 'Ezeiza, Lorenza Zenavilla 344', ''),
(2184, '2017-02-26 00:26:29', '2017-03-23 03:05:10', 'S', 144, 4, 'Argentina', 'Buenos Aires', 'Ezeiza', 'Sin Asignar', 'Noreste', 'Frente', '-34.85500', '-58.51783', 'S', '80458.00', 6, 'N', '0.00', 0, '47.00', '50.00', 1, 1, 2, 0, 'Ezeiza, Lorenza Zenavilla  344', 'LAS LORENZAS ES UN EMPRENDIMIENTO INMOBILIARIO AL COSTO EN PESOS DE 10 PISOS EN LA ZONA RESIDENCIAL MAS EXCLUSIVA DEL CORAZON DE EZEIZA CON COMODIDADES EXCEPCIONALES:\n•	TERRAZA MIRADOR\n•	ESPEJO DE AGUA\n•	PARRILLAS\n•	LAVADERO\n•	BAULERAS\n•	DOS ASCENSORES CON CAPACIDAD PARA SEIS PERSONAS DE ULTIMA GENERACION\nES LA OPORTUNIDAD QUE ESTABAS BUSCANDO CON UN ANTICIPO Y UNA AMPLIA FINANCIACION DE HASTA 24  CUOTAS (INDEXADAS POR LA CAC)\n\nEs  un emprendimiento inmobiliario al costo en pesos que brinda DISEÑO CALIDAD Y CONFORT, como la mejor forma de INVERSION. \n\nGENERALES\n\n•	48 Unidades de viviendas, distribuidas en dos bloques de 3 unidades cada uno por planta.\n•	24 cocheras cubiertas opcionales en planta baja y 24 cocheras cubiertas y semicubiertas opcionales en primer piso.\n•	Hall de entrada con detalles de categoría.\n•	Frente vidriado y puerta de vidrio templado blindex o similar con carpintería metálica. \n•	2 ascensores con puertas automáticas en todos los pisos, de última generación. \n•	Portón de acceso vehicular automático.\n•	Iluminación de planta y palieres de todo el edificio con luminarias de bajo consumo.\n•	Palieres con piso de micropiso o cerámico.\n•	Iluminación de emergencia en todas las plantas. \n•	Escalera de incendio, baranda central, pasamanos y puerta homologada.\n•	Bauleras  ubicadas en el primer piso, cantidad 48 las medidas son 0,95 x 0,75 x 1,30 m \n•	Portero eléctrico en acceso de Planta Baja,\n•	Usos de materiales nobles en exterior: revoques cementicios y hormigón de bajo mantenimiento.\n•	Sala de medidores Gas y Electricidad PB en el acceso vehicular.\n\nAMENITIES\n\n•	Toilette de cortesía, con ante baño, con  acceso desde el SUM del edificio. \n•	SUM en Terraza Mirador.\n•	Terraza con Solarium y Parrilla.\n•	Espejo de Agua. \n•	Lavadero.\nUNIDADES FUNCIONALES\n\n•	Departamentos de 1, 2 ,3 ambientes por planta.\n•	Pisos de cerámica esmaltada de 1ra calidad en todos los ambientes.\n•	Baño y cocina con revestimiento en cerámica esmaltada.\n•	Artefactos sanitarios de losa blanca en baños marca FV o similar.\n•	Línea de grifería marca FV o similar.\n•	Mueble de cocina a medida con alacena y bajo mesada realizados en melanina de 1ra calidad y mesadas graníticas con doble bacha de acero inoxidable y herrajes de 1ra calidad.\n•	Balcones terrazas de prácticas dimensiones con Baranda y estructura metálica.\n•	Palieres con piso de micropiso o cerámica esmaltada.\n•	Instalación para equipos de climatización tipo Split frío/calor en ambientes principales y dormitorios, \n•	Conexión de TV y TE.\n•	Agua caliente central,\n•	Cañería de agua fría y caliente realizadas en termo-fusión.\n•	Revoques en Paredes y cielorrasos en yeso. \n•	Puertas interiores con marco de chapa con hojas de mdf pintadas blancas.\n•	Carpintería exterior de aluminio.\n•	Frente de placard integral en melamina altura piso techo.\n', 'Ezeiza, Lorenza Zenavilla  344', '', 'Ezeiza, Lorenza Zenavilla  344', ''),
(2185, '2017-02-26 00:26:29', '2017-03-23 03:05:10', 'S', 145, 4, 'Argentina', 'Buenos Aires', 'Ezeiza', 'Sin Asignar', 'Noreste', 'Frente', '-34.85500', '-58.51783', 'S', '101924.00', 6, 'N', '0.00', 0, '61.00', '65.00', 2, 1, 2, 0, 'Ezeiza, Lorenza Zenavilla 344', 'LAS LORENZAS ES UN EMPRENDIMIENTO INMOBILIARIO AL COSTO EN PESOS DE 10 PISOS EN LA ZONA RESIDENCIAL MAS EXCLUSIVA DEL CORAZON DE EZEIZA CON COMODIDADES EXCEPCIONALES:\n•	TERRAZA MIRADOR\n•	ESPEJO DE AGUA\n•	PARRILLAS\n•	LAVADERO\n•	BAULERAS\n•	DOS ASCENSORES CON CAPACIDAD PARA SEIS PERSONAS DE ULTIMA GENERACION\nES LA OPORTUNIDAD QUE ESTABAS BUSCANDO CON UN ANTICIPO Y UNA AMPLIA FINANCIACION DE HASTA 24  CUOTAS (INDEXADAS POR LA CAC)\n\nEs  un emprendimiento inmobiliario al costo en pesos que brinda DISEÑO CALIDAD Y CONFORT, como la mejor forma de INVERSION. \n\nGENERALES\n\n•	48 Unidades de viviendas, distribuidas en dos bloques de 3 unidades cada uno por planta.\n•	24 cocheras cubiertas opcionales en planta baja y 24 cocheras cubiertas y semicubiertas opcionales en primer piso.\n•	Hall de entrada con detalles de categoría.\n•	Frente vidriado y puerta de vidrio templado blindex o similar con carpintería metálica. \n•	2 ascensores con puertas automáticas en todos los pisos, de última generación. \n•	Portón de acceso vehicular automático.\n•	Iluminación de planta y palieres de todo el edificio con luminarias de bajo consumo.\n•	Palieres con piso de micropiso o cerámico.\n•	Iluminación de emergencia en todas las plantas. \n•	Escalera de incendio, baranda central, pasamanos y puerta homologada.\n•	Bauleras  ubicadas en el primer piso, cantidad 48 las medidas son 0,95 x 0,75 x 1,30 m \n•	Portero eléctrico en acceso de Planta Baja,\n•	Usos de materiales nobles en exterior: revoques cementicios y hormigón de bajo mantenimiento.\n•	Sala de medidores Gas y Electricidad PB en el acceso vehicular.\n\nAMENITIES\n\n•	Toilette de cortesía, con ante baño, con  acceso desde el SUM del edificio. \n•	SUM en Terraza Mirador.\n•	Terraza con Solarium y Parrilla.\n•	Espejo de Agua. \n•	Lavadero.\nUNIDADES FUNCIONALES\n\n•	Departamentos de 1, 2 ,3 ambientes por planta.\n•	Pisos de cerámica esmaltada de 1ra calidad en todos los ambientes.\n•	Baño y cocina con revestimiento en cerámica esmaltada.\n•	Artefactos sanitarios de losa blanca en baños marca FV o similar.\n•	Línea de grifería marca FV o similar.\n•	Mueble de cocina a medida con alacena y bajo mesada realizados en melanina de 1ra calidad y mesadas graníticas con doble bacha de acero inoxidable y herrajes de 1ra calidad.\n•	Balcones terrazas de prácticas dimensiones con Baranda y estructura metálica.\n•	Palieres con piso de micropiso o cerámica esmaltada.\n•	Instalación para equipos de climatización tipo Split frío/calor en ambientes principales y dormitorios, \n•	Conexión de TV y TE.\n•	Agua caliente central,\n•	Cañería de agua fría y caliente realizadas en termo-fusión.\n•	Revoques en Paredes y cielorrasos en yeso. \n•	Puertas interiores con marco de chapa con hojas de mdf pintadas blancas.\n•	Carpintería exterior de aluminio.\n•	Frente de placard integral en melamina altura piso techo.\n', 'Ezeiza, Lorenza Zenavilla 344', '', 'Ezeiza, Lorenza Zenavilla 344', ''),
(2186, '2017-02-26 00:26:29', '2017-03-23 03:05:10', 'S', 146, 4, 'Argentina', 'Buenos Aires', 'Ezeiza', 'Sin Asignar', 'Sureste', 'Contrafrente', '-34.85500', '-58.51783', 'S', '99093.00', 6, 'N', '0.00', 0, '59.00', '64.00', 2, 1, 2, 0, 'Ezeiza, Lorenza Zenavilla 344', 'LAS LORENZAS ES UN EMPRENDIMIENTO INMOBILIARIO AL COSTO EN PESOS DE 10 PISOS EN LA ZONA RESIDENCIAL MAS EXCLUSIVA DEL CORAZON DE EZEIZA CON COMODIDADES EXCEPCIONALES:\n•	TERRAZA MIRADOR\n•	ESPEJO DE AGUA\n•	PARRILLAS\n•	LAVADERO\n•	BAULERAS\n•	DOS ASCENSORES CON CAPACIDAD PARA SEIS PERSONAS DE ULTIMA GENERACION\nES LA OPORTUNIDAD QUE ESTABAS BUSCANDO CON UN ANTICIPO Y UNA AMPLIA FINANCIACION DE HASTA 24  CUOTAS (INDEXADAS POR LA CAC)\n\nEs  un emprendimiento inmobiliario al costo en pesos que brinda DISEÑO CALIDAD Y CONFORT, como la mejor forma de INVERSION. \n\nGENERALES\n\n•	48 Unidades de viviendas, distribuidas en dos bloques de 3 unidades cada uno por planta.\n•	24 cocheras cubiertas opcionales en planta baja y 24 cocheras cubiertas y semicubiertas opcionales en primer piso.\n•	Hall de entrada con detalles de categoría.\n•	Frente vidriado y puerta de vidrio templado blindex o similar con carpintería metálica. \n•	2 ascensores con puertas automáticas en todos los pisos, de última generación. \n•	Portón de acceso vehicular automático.\n•	Iluminación de planta y palieres de todo el edificio con luminarias de bajo consumo.\n•	Palieres con piso de micropiso o cerámico.\n•	Iluminación de emergencia en todas las plantas. \n•	Escalera de incendio, baranda central, pasamanos y puerta homologada.\n•	Bauleras  ubicadas en el primer piso, cantidad 48 las medidas son 0,95 x 0,75 x 1,30 m \n•	Portero eléctrico en acceso de Planta Baja,\n•	Usos de materiales nobles en exterior: revoques cementicios y hormigón de bajo mantenimiento.\n•	Sala de medidores Gas y Electricidad PB en el acceso vehicular.\n\nAMENITIES\n\n•	Toilette de cortesía, con ante baño, con  acceso desde el SUM del edificio. \n•	SUM en Terraza Mirador.\n•	Terraza con Solarium y Parrilla.\n•	Espejo de Agua. \n•	Lavadero.\nUNIDADES FUNCIONALES\n\n•	Departamentos de 1, 2 ,3 ambientes por planta.\n•	Pisos de cerámica esmaltada de 1ra calidad en todos los ambientes.\n•	Baño y cocina con revestimiento en cerámica esmaltada.\n•	Artefactos sanitarios de losa blanca en baños marca FV o similar.\n•	Línea de grifería marca FV o similar.\n•	Mueble de cocina a medida con alacena y bajo mesada realizados en melanina de 1ra calidad y mesadas graníticas con doble bacha de acero inoxidable y herrajes de 1ra calidad.\n•	Balcones terrazas de prácticas dimensiones con Baranda y estructura metálica.\n•	Palieres con piso de micropiso o cerámica esmaltada.\n•	Instalación para equipos de climatización tipo Split frío/calor en ambientes principales y dormitorios, \n•	Conexión de TV y TE.\n•	Agua caliente central,\n•	Cañería de agua fría y caliente realizadas en termo-fusión.\n•	Revoques en Paredes y cielorrasos en yeso. \n•	Puertas interiores con marco de chapa con hojas de mdf pintadas blancas.\n•	Carpintería exterior de aluminio.\n•	Frente de placard integral en melamina altura piso techo.\n', 'Ezeiza, Lorenza Zenavilla 344', '', 'Ezeiza, Lorenza Zenavilla 344', ''),
(2187, '2017-02-26 00:26:29', '2017-03-23 03:05:11', 'S', 147, 4, 'Argentina', 'Buenos Aires', 'Ezeiza', 'Sin Asignar', 'Sureste', 'Contrafrente', '-34.85500', '-58.51783', 'S', '80458.00', 6, 'N', '0.00', 0, '47.00', '50.00', 1, 1, 2, 0, 'Ezeiza, Lorenza Zenavilla  344', 'LAS LORENZAS ES UN EMPRENDIMIENTO INMOBILIARIO AL COSTO EN PESOS DE 10 PISOS EN LA ZONA RESIDENCIAL MAS EXCLUSIVA DEL CORAZON DE EZEIZA CON COMODIDADES EXCEPCIONALES:\n•	TERRAZA MIRADOR\n•	ESPEJO DE AGUA\n•	PARRILLAS\n•	LAVADERO\n•	BAULERAS\n•	DOS ASCENSORES CON CAPACIDAD PARA SEIS PERSONAS DE ULTIMA GENERACION\nES LA OPORTUNIDAD QUE ESTABAS BUSCANDO CON UN ANTICIPO Y UNA AMPLIA FINANCIACION DE HASTA 24  CUOTAS (INDEXADAS POR LA CAC)\n\nEs  un emprendimiento inmobiliario al costo en pesos que brinda DISEÑO CALIDAD Y CONFORT, como la mejor forma de INVERSION. \n\nGENERALES\n\n•	48 Unidades de viviendas, distribuidas en dos bloques de 3 unidades cada uno por planta.\n•	24 cocheras cubiertas opcionales en planta baja y 24 cocheras cubiertas y semicubiertas opcionales en primer piso.\n•	Hall de entrada con detalles de categoría.\n•	Frente vidriado y puerta de vidrio templado blindex o similar con carpintería metálica. \n•	2 ascensores con puertas automáticas en todos los pisos, de última generación. \n•	Portón de acceso vehicular automático.\n•	Iluminación de planta y palieres de todo el edificio con luminarias de bajo consumo.\n•	Palieres con piso de micropiso o cerámico.\n•	Iluminación de emergencia en todas las plantas. \n•	Escalera de incendio, baranda central, pasamanos y puerta homologada.\n•	Bauleras  ubicadas en el primer piso, cantidad 48 las medidas son 0,95 x 0,75 x 1,30 m \n•	Portero eléctrico en acceso de Planta Baja,\n•	Usos de materiales nobles en exterior: revoques cementicios y hormigón de bajo mantenimiento.\n•	Sala de medidores Gas y Electricidad PB en el acceso vehicular.\n\nAMENITIES\n\n•	Toilette de cortesía, con ante baño, con  acceso desde el SUM del edificio. \n•	SUM en Terraza Mirador.\n•	Terraza con Solarium y Parrilla.\n•	Espejo de Agua. \n•	Lavadero.\nUNIDADES FUNCIONALES\n\n•	Departamentos de 1, 2 ,3 ambientes por planta.\n•	Pisos de cerámica esmaltada de 1ra calidad en todos los ambientes.\n•	Baño y cocina con revestimiento en cerámica esmaltada.\n•	Artefactos sanitarios de losa blanca en baños marca FV o similar.\n•	Línea de grifería marca FV o similar.\n•	Mueble de cocina a medida con alacena y bajo mesada realizados en melanina de 1ra calidad y mesadas graníticas con doble bacha de acero inoxidable y herrajes de 1ra calidad.\n•	Balcones terrazas de prácticas dimensiones con Baranda y estructura metálica.\n•	Palieres con piso de micropiso o cerámica esmaltada.\n•	Instalación para equipos de climatización tipo Split frío/calor en ambientes principales y dormitorios, \n•	Conexión de TV y TE.\n•	Agua caliente central,\n•	Cañería de agua fría y caliente realizadas en termo-fusión.\n•	Revoques en Paredes y cielorrasos en yeso. \n•	Puertas interiores con marco de chapa con hojas de mdf pintadas blancas.\n•	Carpintería exterior de aluminio.\n•	Frente de placard integral en melamina altura piso techo.\n', 'Ezeiza, Lorenza Zenavilla  344', '', 'Ezeiza, Lorenza Zenavilla  344', ''),
(2188, '2017-02-26 00:26:29', '2017-03-23 03:05:11', 'S', 148, 4, 'Argentina', 'Buenos Aires', 'Ezeiza', 'Sin Asignar', 'Sureste', 'Contrafrente', '-34.85500', '-58.51783', 'S', '98973.00', 6, 'N', '0.00', 0, '59.00', '64.00', 2, 1, 2, 0, 'Ezeiza, Lorenza Zenavilla 344', 'LAS LORENZAS ES UN EMPRENDIMIENTO INMOBILIARIO AL COSTO EN PESOS DE 10 PISOS EN LA ZONA RESIDENCIAL MAS EXCLUSIVA DEL CORAZON DE EZEIZA CON COMODIDADES EXCEPCIONALES:\n•	TERRAZA MIRADOR\n•	ESPEJO DE AGUA\n•	PARRILLAS\n•	LAVADERO\n•	BAULERAS\n•	DOS ASCENSORES CON CAPACIDAD PARA SEIS PERSONAS DE ULTIMA GENERACION\nES LA OPORTUNIDAD QUE ESTABAS BUSCANDO CON UN ANTICIPO Y UNA AMPLIA FINANCIACION DE HASTA 24  CUOTAS (INDEXADAS POR LA CAC)\n\nEs  un emprendimiento inmobiliario al costo en pesos que brinda DISEÑO CALIDAD Y CONFORT, como la mejor forma de INVERSION. \n\nGENERALES\n\n•	48 Unidades de viviendas, distribuidas en dos bloques de 3 unidades cada uno por planta.\n•	24 cocheras cubiertas opcionales en planta baja y 24 cocheras cubiertas y semicubiertas opcionales en primer piso.\n•	Hall de entrada con detalles de categoría.\n•	Frente vidriado y puerta de vidrio templado blindex o similar con carpintería metálica. \n•	2 ascensores con puertas automáticas en todos los pisos, de última generación. \n•	Portón de acceso vehicular automático.\n•	Iluminación de planta y palieres de todo el edificio con luminarias de bajo consumo.\n•	Palieres con piso de micropiso o cerámico.\n•	Iluminación de emergencia en todas las plantas. \n•	Escalera de incendio, baranda central, pasamanos y puerta homologada.\n•	Bauleras  ubicadas en el primer piso, cantidad 48 las medidas son 0,95 x 0,75 x 1,30 m \n•	Portero eléctrico en acceso de Planta Baja,\n•	Usos de materiales nobles en exterior: revoques cementicios y hormigón de bajo mantenimiento.\n•	Sala de medidores Gas y Electricidad PB en el acceso vehicular.\n\nAMENITIES\n\n•	Toilette de cortesía, con ante baño, con  acceso desde el SUM del edificio. \n•	SUM en Terraza Mirador.\n•	Terraza con Solarium y Parrilla.\n•	Espejo de Agua. \n•	Lavadero.\nUNIDADES FUNCIONALES\n\n•	Departamentos de 1, 2 ,3 ambientes por planta.\n•	Pisos de cerámica esmaltada de 1ra calidad en todos los ambientes.\n•	Baño y cocina con revestimiento en cerámica esmaltada.\n•	Artefactos sanitarios de losa blanca en baños marca FV o similar.\n•	Línea de grifería marca FV o similar.\n•	Mueble de cocina a medida con alacena y bajo mesada realizados en melanina de 1ra calidad y mesadas graníticas con doble bacha de acero inoxidable y herrajes de 1ra calidad.\n•	Balcones terrazas de prácticas dimensiones con Baranda y estructura metálica.\n•	Palieres con piso de micropiso o cerámica esmaltada.\n•	Instalación para equipos de climatización tipo Split frío/calor en ambientes principales y dormitorios, \n•	Conexión de TV y TE.\n•	Agua caliente central,\n•	Cañería de agua fría y caliente realizadas en termo-fusión.\n•	Revoques en Paredes y cielorrasos en yeso. \n•	Puertas interiores con marco de chapa con hojas de mdf pintadas blancas.\n•	Carpintería exterior de aluminio.\n•	Frente de placard integral en melamina altura piso techo.\n', 'Ezeiza, Lorenza Zenavilla 344', '', 'Ezeiza, Lorenza Zenavilla 344', ''),
(2189, '2017-02-26 00:26:29', '2017-03-23 03:05:11', 'S', 149, 4, 'Argentina', 'Buenos Aires', 'Ezeiza', 'Sin Asignar', 'Noreste', 'Frente', '-34.85500', '-58.51783', 'S', '71549.00', 6, 'N', '0.00', 0, '35.00', '40.00', 0, 1, 2, 0, 'Ezeiza, Lorenza Zenavilla 344', 'Ambiente único con kitchenette integrada, baño completo y amplio balcón.\n•	Pisos de cerámica esmaltada de 1ra calidad en todos los ambientes.\n•	Baño y cocina con revestimiento en cerámica esmaltada.\n•	Artefactos sanitarios de losa blanca en baños marca FV o similar.\n•	Línea de grifería marca FV o similar.\n•	Mueble de cocina a medida con alacena y bajo mesada realizados en melanina de 1ra calidad y mesadas graníticas con doble bacha de acero inoxidable y herrajes de 1ra calidad.\n•	Balcones terrazas de prácticas dimensiones con Baranda y estructura metálica.\n•	Palieres con piso de micropiso o cerámica esmaltada.\n•	Instalación para equipos de climatización tipo Split frío/calor en ambientes principales y dormitorios, \n•	Conexión de TV y TE.\n•	Agua caliente central,\n•	Cañería de agua fría y caliente realizadas en termo-fusión.\n•	Revoques en Paredes y cielorrasos en yeso. \n•	Puertas interiores con marco de chapa con hojas de mdf pintadas blancas.\n•	Carpintería exterior de aluminio.\n•	Frente de placard integral en melamina altura piso techo\n', 'Ezeiza, Lorenza Zenavilla 344', '', 'Ezeiza, Lorenza Zenavilla 344', ''),
(2190, '2017-02-26 00:26:30', '2017-03-23 03:05:11', 'S', 150, 4, 'Argentina', 'Buenos Aires', 'Ezeiza', 'Sin Asignar', 'Noreste', 'Frente', '-34.85500', '-58.51783', 'S', '81239.00', 6, 'N', '0.00', 0, '47.00', '50.00', 1, 1, 2, 0, 'Ezeiza, Lorenza Zenavilla  344', 'LAS LORENZAS ES UN EMPRENDIMIENTO INMOBILIARIO AL COSTO EN PESOS DE 10 PISOS EN LA ZONA RESIDENCIAL MAS EXCLUSIVA DEL CORAZON DE EZEIZA CON COMODIDADES EXCEPCIONALES:\n•	TERRAZA MIRADOR\n•	ESPEJO DE AGUA\n•	PARRILLAS\n•	LAVADERO\n•	BAULERAS\n•	DOS ASCENSORES CON CAPACIDAD PARA SEIS PERSONAS DE ULTIMA GENERACION\nES LA OPORTUNIDAD QUE ESTABAS BUSCANDO CON UN ANTICIPO Y UNA AMPLIA FINANCIACION DE HASTA 24  CUOTAS (INDEXADAS POR LA CAC)\n\nEs  un emprendimiento inmobiliario al costo en pesos que brinda DISEÑO CALIDAD Y CONFORT, como la mejor forma de INVERSION. \n\nGENERALES\n\n•	48 Unidades de viviendas, distribuidas en dos bloques de 3 unidades cada uno por planta.\n•	24 cocheras cubiertas opcionales en planta baja y 24 cocheras cubiertas y semicubiertas opcionales en primer piso.\n•	Hall de entrada con detalles de categoría.\n•	Frente vidriado y puerta de vidrio templado blindex o similar con carpintería metálica. \n•	2 ascensores con puertas automáticas en todos los pisos, de última generación. \n•	Portón de acceso vehicular automático.\n•	Iluminación de planta y palieres de todo el edificio con luminarias de bajo consumo.\n•	Palieres con piso de micropiso o cerámico.\n•	Iluminación de emergencia en todas las plantas. \n•	Escalera de incendio, baranda central, pasamanos y puerta homologada.\n•	Bauleras  ubicadas en el primer piso, cantidad 48 las medidas son 0,95 x 0,75 x 1,30 m \n•	Portero eléctrico en acceso de Planta Baja,\n•	Usos de materiales nobles en exterior: revoques cementicios y hormigón de bajo mantenimiento.\n•	Sala de medidores Gas y Electricidad PB en el acceso vehicular.\n\nAMENITIES\n\n•	Toilette de cortesía, con ante baño, con  acceso desde el SUM del edificio. \n•	SUM en Terraza Mirador.\n•	Terraza con Solarium y Parrilla.\n•	Espejo de Agua. \n•	Lavadero.\nUNIDADES FUNCIONALES\n\n•	Departamentos de 1, 2 ,3 ambientes por planta.\n•	Pisos de cerámica esmaltada de 1ra calidad en todos los ambientes.\n•	Baño y cocina con revestimiento en cerámica esmaltada.\n•	Artefactos sanitarios de losa blanca en baños marca FV o similar.\n•	Línea de grifería marca FV o similar.\n•	Mueble de cocina a medida con alacena y bajo mesada realizados en melanina de 1ra calidad y mesadas graníticas con doble bacha de acero inoxidable y herrajes de 1ra calidad.\n•	Balcones terrazas de prácticas dimensiones con Baranda y estructura metálica.\n•	Palieres con piso de micropiso o cerámica esmaltada.\n•	Instalación para equipos de climatización tipo Split frío/calor en ambientes principales y dormitorios, \n•	Conexión de TV y TE.\n•	Agua caliente central,\n•	Cañería de agua fría y caliente realizadas en termo-fusión.\n•	Revoques en Paredes y cielorrasos en yeso. \n•	Puertas interiores con marco de chapa con hojas de mdf pintadas blancas.\n•	Carpintería exterior de aluminio.\n•	Frente de placard integral en melamina altura piso techo.\n', 'Ezeiza, Lorenza Zenavilla  344', '', 'Ezeiza, Lorenza Zenavilla  344', ''),
(2191, '2017-02-26 00:26:30', '2017-03-23 03:05:11', 'S', 236, 4, 'Argentina', 'Buenos Aires', 'Canning', 'Canning', 'Este', 'Interno', '-34.86293', '-58.50043', 'S', '135000.00', 6, 'S', '10000.00', 5, '89.00', '89.00', 2, 1, 1, 4, 'Canning, Av. Lacarra 537', 'Impecable departamento 3 ambientes en Planta baja recién pintado en Amaneceres de Canning. Cuenta con living. comedor, cocina completa con pasaplatos, pisos de porcelanato; dos dormitorios con pisos flotantes y placares empotrados con interior completo. Baño con bañera, lavatorio, inodoro con depósito de agua por mochila accesoria y bidet. Amplio espejo. Patio interno con parrilla con pérgola. Muy luminoso. El predio cuenta con canchas de tennis, piscina, sum, gimnasio y área recreativa infantil. Vigilancia las 24 hs.', 'Canning, Av. Lacarra 537', '', 'Canning, Av. Lacarra 537', ''),
(2192, '2017-02-26 00:26:30', '2017-03-23 03:05:12', 'S', 244, 4, 'Argentina', 'Buenos Aires', 'Canning', 'Canning', 'Sureste', 'Frente', '-34.86293', '-58.50043', 'S', '90000.00', 6, 'N', '0.00', 0, '50.00', '60.00', 1, 1, 1, 4, 'Canning, Lacarra 537', 'Amplio departamento ubicado en planta alta con acceso por escalera en el Condominio Residences de Canning.\nCuenta con un dormitorio con vista a la pisicna, amplio living- comedor, cocina completa con pasaplatos y balcón terraza con parrilla. Muy confortable, cerca del centro comercial. Vigiancia las 24 hs, canchas de tennis, gimnasio, SUM, área de recreción infantil y piscina. Una muy buena opción para disfrutar del aire puro que ofrece Canning. No te lo pierdas!!!', 'Canning, Lacarra 537', '', 'Canning, Lacarra 537', ''),
(2193, '2017-02-26 00:26:31', '2017-03-23 03:05:12', 'S', 246, 4, 'Argentina', 'Buenos Aires', 'Canning', 'Canning', 'Noroeste', 'Interno', '-34.86619', '-58.50701', 'S', '83000.00', 6, 'N', '0.00', 0, '0.00', '0.00', 1, 0, 0, 0, 'Canning, Maipu 60', '\nDepartamento de 2 ambientes de 45 m² en planta alta, con cocina comedor equipada con muebles bajo mesada y artefacto de cocina, un dormitorio con frente de placard, baño completo con bañera.\n- Portón de ingreso automatizado, calles internas pavimentadas\n- Infraestructura subterránea. \nBajas expensas. \nAmenities: \n- 2 piscinas ; una climatizada, \n- Solarium. \n- Vestuarios, sauna y ducha finlandesa. \n- S.U.M. \n- Gimnasio con sala de spa. \n- Area de recreación infantil\n- Estacionamiento', 'Canning, Maipu 60', '', 'Canning, Maipu 60', '');
INSERT INTO `propiedades` (`id`, `fecha_creado`, `fecha_modificado`, `activo`, `profit_id`, `tipo_propiedad`, `pais`, `provincia`, `localidad`, `zona`, `orientacion`, `ubicacion`, `loc_lat`, `loc_long`, `en_venta`, `precio_venta`, `moneda_venta_id`, `en_alquiler`, `precio_alquiler`, `moneda_alquiler_id`, `sup_cubierta`, `sup_total`, `cant_habitaciones`, `cant_banos`, `cant_cocheras`, `antiguedad`, `titulo_es`, `descripcion_es`, `titulo_en`, `descripcion_en`, `titulo_pt`, `descripcion_pt`) VALUES
(2194, '2017-02-26 00:26:31', '2017-03-23 03:05:13', 'S', 59, 3, 'Argentina', 'Buenos Aires', 'Luis Guillon', 'Sin Asignar', 'Noroeste', 'Frente', '-34.80565', '-58.47085', 'S', '80000.00', 6, 'N', '0.00', 0, '85.00', '122.00', 2, 2, 2, 49, 'Luis Guillon, Av. Bruzzone 1247', 'OPORTUNIDAD!!! \nCasa a reciclar en Luis Guillón! \nCasa al frente con dos dormitorios, un baño, living, comedor y cocina. Zona lavadero en el patio trasero. \nCuenta con un departamento al fondo con un dormitorio cocina-comedor y baño. \nGalpón a terminar.\nPosibilidades de construir en altura.\nu$s 80.000 libre de gastos. \n', 'Luis Guillon, Av. Bruzzone 1247', 'OPPORTUNITY!!!\nHouse to recycle in Luis Guillón!\nHouse to the street with two bedrooms, one bathroom, living room, dining room and kitchen. Laundry area in the backyard.\nIt has an apartment in the back with a bedroom kitchen and bathroom.\nShed to finish.\nPossibilities to build in height.\nU $ s 80,000 free of expenses.', 'Luis Guillon, Av. Bruzzone 1247', 'OPORTUNIDADE !!!\nCasa reciclar em Luis Guillon!\ncasa da frente com dois quartos, um banheiro, sala e cozinha. Lavandaria na área de quintal.\nEle tem um departamento para financiar uma cozinha e banheiro.\nfinal galpón.\nPossibilidades de altura do edifício.\nu $ s 80.000 gratuitamente.'),
(2195, '2017-02-26 00:26:32', '2017-03-23 03:05:14', 'S', 115, 3, 'Argentina', 'Buenos Aires', 'Monte Grande', 'Centro', 'Sin Informar', 'Sin Informar', '-34.82073', '-58.46573', 'S', '180000.00', 6, 'N', '0.00', 0, '0.00', '322.00', 0, 0, 0, 0, 'Monte Grande, Italiani  41', 'Chalet  para demolición. Lote  11,50  x  28 mtrs.  Sup. Total:  322 m2. Posibilidad de Construir hasta PB + 3 PISOS (con cocheras obligatorias) . F.O.T  0,6%. F.O.T  1,7%. Excelente Ubicación  entre calles  Alem  y Vicente Lopez .  A la vuelta de la Plaza Principal y la Municipalidad de Esteban Echeverria.', 'Monte Grande, Italiani  41', '', 'Monte Grande, Italiani  41', ''),
(2196, '2017-02-26 00:26:32', '2017-03-23 03:05:15', 'S', 117, 3, 'Argentina', 'Buenos Aires', 'Monte Grande', 'Centro', 'Sin Informar', 'Sin Informar', '-34.80616', '-58.47523', 'S', '240000.00', 6, 'N', '0.00', 0, '150.00', '416.00', 3, 1, 1, 0, 'Monte Grande, Mazza 468', ' Chalet en 3 niveles sobre generoso lote  de 8 x 52. Sup 416 m2. Sup. Cubierta 150 m2. Jardín al frente, entrada de autos c/ portón automático, garage en bajo nivel  c/ bomba aliviadora, en primer nivel, amplio living comedor al frente, toilette de recepción, cocina comedor bien equipada, lavadero cubierto, escaleras metálicas con escalones de madera que comunican con el segundo nivel, 3 dormitorios con placard, baño completo compartimentado, amplio fondo libre parquizado con piscina de fibra. VENTA DIRECTA. Muy buen estado general. Ubicación : entre calles Perez Iglesias  y  A. Sardi. A 100 mtrs de calle Nuestras Malvinas, Bruzzone y Av. Fair  -  Valette. ', 'Monte Grande, Mazza 468', '', 'Monte Grande, Mazza 468', ''),
(2197, '2017-02-26 00:26:32', '2017-03-23 03:05:15', 'S', 125, 3, 'Argentina', 'Buenos Aires', 'San Vicente', 'Sin Asignar', 'Sin Informar', 'Sin Informar', '-35.03718', '-58.45567', 'S', '200000.00', 6, 'N', '0.00', 0, '148.00', '194.00', 2, 2, 0, 0, 'San Vicente, Ruta 58  15,5 Km', 'Excelente casa en Barrio Santa Rita- Casa compuesta hall de entrada - dos dormitorios- Amplio living comedor- Dos baños completos- Quincho y lavadero- Excelente diseño que brinda confort y calidad- Muy Luminosa- Consultee!!', 'San Vicente, Ruta 58  15,5 Km', '', 'San Vicente, Ruta 58  15,5 Km', ''),
(2198, '2017-02-26 00:26:32', '2017-03-23 03:05:16', 'S', 128, 3, 'Argentina', 'Buenos Aires', 'Luis Guillon', 'Sin Asignar', 'Suroeste', 'Frente', '-34.81149', '-58.43942', 'S', '165000.00', 6, 'N', '0.00', 0, '126.00', '287.00', 2, 1, 1, 0, 'Luis Guillon, Estevez  918', 'Casa al Chalet desarrollado en una planta, acceso frontal por amplio living, ventilación e iluminación natural por ventana de dos hojas abatibles con persiana de madera de enrollar, primer dormitorio con ventilador de techo, aire Split y placard empotrado a la pared piso-techo,  iluminación y ventilación por ventana de dos hojas correderas con persianas de madera de enrollar. Segundo dormitorio, con placard de madera, ventana lindera a un tercer dormitorio. Baño completo con inodoro con depósito de agua empotrado a la pared, bidet y duchador, con cuadro de ducha completo,  lavatorio de pie con grifería completa. Cocina independiente con puerta corrediza divisoria, muebles bajo mesada, cajonera y alacena. Mesada de granito. Bacha doble con grifería de doble comando, iluminación y ventilación natural por ventana de madera  corredera con rejas. Comedor, iluminación y ventilación natural por ventana de dos hojas correderas, estantería de madera. Puerta de acceso a un tercer dormitorio, lindero al segundo dormitorio. Acceso a parque trasero por puerta de madera, amplio parque con dos parrillas y quincho semicubierto. Lavadero externo. Termo tanque ubicado fuera del inmueble, marca DOMEC de 110 litros. Cochera semi cubierta de acceso por portón de rejas abatibles.', 'Luis Guillon, Estevez  918', '', 'Luis Guillon, Estevez  918', ''),
(2199, '2017-02-26 00:26:34', '2017-03-23 03:05:17', 'S', 132, 3, 'Argentina', 'Buenos Aires', 'Monte Grande', 'Centro', 'Sin Informar', 'Sin Informar', '-34.82622', '-58.45706', 'S', '98000.00', 6, 'N', '0.00', 0, '132.00', '300.00', 2, 1, 1, 50, 'Monte Grande, Rodriguez  1278', 'Casa a remodelar en Monte Grande compuesta por dos dormitorios, baño completo con cuadro de ducha, amplio living y concina comedor. deposito trasero con parrilla. Patio y jardín libre. Cochera semicubierta con techo de teja al frente. ', 'Monte Grande, Rodriguez  1278', '', 'Monte Grande, Rodriguez  1278', ''),
(2200, '2017-02-26 00:26:34', '2017-03-23 03:05:17', 'S', 135, 3, 'Argentina', 'Buenos Aires', 'Monte Grande', 'Centro', 'Sureste', 'Sin Informar', '-34.84928', '-58.44850', 'S', '120000.00', 6, 'N', '0.00', 0, '220.00', '1200.00', 3, 4, 1, 10, 'Monte Grande, Azul  298', 'Casa Quinta tipo residencial ubicada en el tercio anterior del lote que actualmente integra bajo el mismo  dominio el lote lindero donde se ubica la piscina en situación posterior.\nResuelto en 2 plantas, con descripción de ocupación del suelo y distribución de superficies, con un factor de ocupación total inferior al 0,6% de la superficie total del lote.\nFrente con dársena de acceso vehicular. \nPlanta Baja: Elevación a tres peldaños de la cota cero del lote para acceso al inmueble por hall de recepción a living integrado en dos áreas bien definidas. Ala izquierda con hogar revestido, paramento vertical lateral con doble vidriado recubierto por Roller Screen Blackout; ala derecha con dibujo de Bow Window  de vidrio repartido en cuadrantes amplios; Toilette de recepción. Cocina con muebles bajo mesada con puertas abatibles, isla central con portacopas. Artefactos de cocina completos. Comedor con acceso a galería posterior. Iluminación 9/10.  \nPlanta Alta: Acceso por escalera de peldaños de madera con descanso. Dormitorio principal con vestidor y baño completo en suite. Iluminación en paramento vertical lateral por Bow Window vidriado con revestimiento por cortinado de Blackout. Segundo y tercer dormitorios con baños en suite.\nGaleria: Semicubierta. Recubre ala y media del inmueble: posterior y lateral lindante con lote a piscina. Incluye parrilla completa cubierta, horno de obra cerrado con hierro forjado. \nLote lindero: piscina de obra con cerramiento perimetral. \nDelimitación de lotes definida por parquización.\n', 'Monte Grande, Azul  298', '', 'Monte Grande, Azul  298', ''),
(2201, '2017-02-26 00:26:34', '2017-03-23 03:05:18', 'S', 242, 3, 'Argentina', 'Buenos Aires', 'Monte Grande', 'Centro', 'Este', 'Frente', '-34.84233', '-58.45463', 'S', '120000.00', 6, 'N', '0.00', 0, '150.00', '170.00', 2, 0, 1, 0, 'Monte Grande, Juarez 2823', 'Casa construida sobre dos lotes; amplio quincho con parrilla y baño de servicio a terminar. 50 m2 con techo de carpintería de madera y tejas francesas, cochera pasante con techado de policarbonato.\nAmplio living comedor con pisos de madera tarugada y modular de madera empotrado hecho a medida, escalera de madera a planta alta donde hay un estar/atelier balconeando. Baño completo con bañera. Dos dormitorios con pisos de parquet y placard. Cocina-comedor amoblado y con artefactos de cocina.', 'Monte Grande, Juarez 2823', '', 'Monte Grande, Juarez 2823', ''),
(2202, '2017-02-26 00:26:35', '2017-03-23 03:05:19', 'S', 4, 10, 'Argentina', 'Buenos Aires', 'El Jaguel ,partido Esteban Echeverria', 'Sin Asignar', 'Suroeste', 'Frente', '-34.82462', '-58.48453', 'N', '0.00', 0, 'S', '7000.00', 5, '43.00', '143.00', 0, 1, 0, 30, 'El Jaguel ,partido Esteban Echeverria, Dardo Rocha 1272', 'Excelente local comercial  de 4,10 x 10.55 mts con doble altura, con persiana de malla ciega de enrollar y puerta de escape al frente, persiana posterior de malla ciega a enrollar. Techo de losa. Toilette de 1,5 x 1  metros con lavatorio de pie e inodoro con depósito de agua empotrado a pared, con revestimiento cerámico 2/3. Apto varios destinos. Fondo libre de 4,10 x 22 metros, medianeras lateral de ladrillo, futuro cerco a local colindante. ', 'El Jaguel ,partido Esteban Echeverria, Dardo Rocha 1272', '', 'El Jaguel ,partido Esteban Echeverria, Dardo Rocha 1272', ''),
(2203, '2017-02-26 00:26:35', '2017-03-23 03:05:19', 'S', 120, 10, 'Argentina', 'Buenos Aires', 'Ezeiza', 'Sin Asignar', 'Sin Informar', 'Sin Informar', '-34.85419', '-58.52565', 'N', '0.00', 0, 'S', '6000.00', 5, '0.00', '0.00', 0, 0, 0, 0, 'Ezeiza, Gral. Urquiza  111', ' 4 locales en Ezeiza, ubicados en PB del edificio Terrazas de Ezeiza,  a 100 metros de la estacion de trenes y en frente a la municipalidad de Ezeiza. Local de   amplia vidriera con persiana metalica automatizada, baño y pisos de porcelanato.  Consulte!! ', 'Ezeiza, Gral. Urquiza  111', '', 'Ezeiza, Gral. Urquiza  111', ''),
(2204, '2017-02-26 00:26:36', '2017-03-23 03:05:19', 'S', 121, 10, 'Argentina', 'Buenos Aires', 'Ezeiza', 'Sin Asignar', 'Suroeste', 'Frente', '-34.85419', '-58.52565', 'N', '0.00', 0, 'S', '7000.00', 5, '0.00', '0.00', 0, 0, 0, 0, 'Ezeiza, Gral.urquiza 111', 'Excelentes locales en Ezeiza, ubicado en PB del edificio Terrazas de Ezeiza,  a 100 metros de la estacion de trenes y en frente a la municipalidad de Ezeiza. El local de   amplia vidriera con persiana metalica automatizada, baño y pisos de porcelanato.  Consulte!! ', 'Ezeiza, Gral.urquiza 111', '', 'Ezeiza, Gral.urquiza 111', ''),
(2205, '2017-02-26 00:26:36', '2017-03-23 03:05:19', 'S', 9, 11, 'Argentina', 'Buenos Aires', 'Tristan Suarez', 'Tristan Suarez', 'Este', 'Frente', '-34.87487', '-58.58496', 'S', '78000.00', 6, 'N', '0.00', 0, '0.00', '0.00', 0, 0, 0, 0, 'Tristan Suarez, Au. Ezeiza-cañuelas Km 42', 'Lote de 1008 m², ubicado en esquina. \nSu ubicación permite conexiones directas con CABA y la zona de Cañuelas. \nEs un Barrio privado Residencial orientado a la vida en zona exclusiva con invitación al descanso y tranquilidad en un contexto totalmente descontracturado. \nSus instalaciones se dividen por áreas: Zona Piletas (con una pileta interior climatizada, jacuzzi interior, plaza exterior para adultos, pileta exterior para niños y un jacuzzi exterior); Club House (con sala de juegos para niños, sala de juegos para adolescentes, micro cine, gimnasio con equipos de última tecnología, un sauna, bar y SUM), área deportiva (con canchas de tenis, canchas de futbol, gimnasio exterior y plaza de juegos infantiles); se proyecta un área de relajación en zona de arboleda como Tea House.\n¿Qué marca la diferencia?:\n1- La eliminación total de tráfico circundante, elemento que promueve acumulación de estrés y que motiva a la diagramación constante de rutas de acceso a los Barrios ubicados en zonas como Canning por el abrupto incremento demográfico. \n2- Baja densidad poblacional, lo que proporciona un ambiente de descanso asegurado.\n3- Este lote ya está en posesión, lo que implica que podés levantar tu casa de manera inmediata. \n4- La infraestructura es completa (Agua-cloacas-luz-gas), lo que marca diferencia con otros Barrios consolidados del corredor verde. ', 'Tristan Suarez, Au. Ezeiza-cañuelas Km 42', 'Lot of 1008 m², located on the corner.\nIts location allows direct connections with CABA and the Cañuelas area.\nIt is a private residential neighborhood oriented to life in exclusive area with invitation to rest and tranquility in a totally descontracturado context.\nIts facilities are divided by areas: Zona Piletas (with an indoor heated pool, indoor jacuzzi, outdoor plaza for adults, outdoor pool for children and an outdoor jacuzzi); Club House (with children''s playroom, games room for teenagers, micro cinema, gym with state-of-the-art equipment, sauna, bar and SUM), sports area (with tennis courts, soccer fields, Of children''s games); An area of ??relaxation is projected in a wooded area like Tea House.\nWhat makes the difference ?:\n1- The total elimination of surrounding traffic, element that promotes accumulation of stress and that motivates to the constant diagram of routes of access to the Districts located in zones like Canning by the abrupto demographic increase.\n2- Low population density, which provides an assured rest environment.\n3- This lot is already in possession, which implies that you can raise your house immediately.\n4- The infrastructure is complete (Water-sewers-light-gas), which makes a difference with other Consolidated neighborhoods of the green corridor.', 'Tristan Suarez, Au. Ezeiza-cañuelas Km 42', 'Lote de 1008 metros quadrados, localizado em uma esquina.\nA sua localização permite conexões diretas com CABA e Cañuelas área.\nÉ uma área orientada para a vida com convite exclusivo para descanso e tranquilidade em um contexto descontracturado bairro residencial totalmente privado.\nSuas instalações são divididas por áreas: Área Piletas (com uma piscina interior aquecida, jacuzzi interior, praça ao ar livre para adultos, piscina exterior para crianças e um jacuzzi exterior); Club House (com sala de jogos para crianças, sala de jogos para adolescentes, micro cinema, academia com equipamentos de última tecnologia, sauna, bar e SUM), área de esportes (campos de ténis, campos de futebol, ginásio ao ar livre e estacionamento jogos para crianças); uma área de relaxamento é projetada área arborizada como Tea House.\nO que faz a diferença?:\n1- A eliminação total do tráfego circundante, um elemento que promove o acúmulo de estresse e motiva a disposição constante de vias de acesso aos bairros localizados em áreas como Canning pelo aumento populacional abrupto.\n2- A baixa densidade populacional, proporcionando uma atmosfera de descanso assegurado.\n3- Este lote já está na posse, o que significa que você pode aumentar sua casa imediatamente.\n4- A infra-estrutura é completa (água-esgoto-gás leve), que faz a diferença com outro corredor verde Barrios consolidada.'),
(2206, '2017-02-26 00:26:36', '2017-03-23 03:05:19', 'S', 74, 11, 'Argentina', 'Buenos Aires', 'Alejandro Petion, Cañuelas', 'Sin Asignar', 'Este', 'Frente', '-34.97775', '-58.66263', 'S', '100000.00', 6, 'N', '0.00', 0, '1677.00', '1677.00', 0, 0, 0, 0, 'Alejandro Petion, Cañuelas, Mariano Acosta 717', 'LOMAS DE PETION - EXCELENTE OPORTUNIDAD DE INVERSIÓN EN EXCLUSIVAS QUINTAS URBANAS - Una propuesta inigualable a 40 minutos del Obelisco y 15'' del Aeropuerto Internacional de Ezeiza, entre la Au. Ezeiza Cañuelas y la Ruta Nacional 205\nDisfrutá del aire puro, libre de ruidos e incomodidades en el sector Polista por excelencia de Buenos Aires, con acceso por asfalto y bajada directa de autopista. \nLOTE DE 1677 M², CON 24 MTS DE FRENTE Y 70 DE FONDO- CALLES CIRCULANTES ASFALTADAS Y AREAS DE SERVICIOS -ILUMINACIÓN VIAL - CERCO PERIMETRAL OLIMPICO - SEGURIDAD - ACCESO INDEPENDIENTE A PROVEEDORES  - SOBRE UN PREDIO DE 40 HAS CON ESPACIOS VERDES, AREAS DE RECREACION Y FORESTACIÓN PROPIA DE LA ZONA - A METROS DEL CENTRO COMERCIAL, ASISTENCIAL Y DESTACAMENTO POLICIAL DE PETIÓN Y COLEGIO BILINGÜE - AMPLIA FINANANCIACIÓN - 35% AL BOLETO + CUOTAS -  LA OPCIÓN PARA MEJORAR TU CALIDAD DE VIDA, LOMAS DE PETION EL LUGAR PARA TU HOGAR.', 'Alejandro Petion, Cañuelas, Mariano Acosta 717', 'LOMAS DE PETION - EXCELLENT INVESTMENT OPPORTUNITY IN EXCLUSIVE URBAN FACILITIES - An unbeatable proposal 40 minutes from the Obelisk and 15 ''from the International Airport of Ezeiza, between the Au. Ezeiza Cañuelas and the National Route 205\nEnjoy the pure air, free of noise and discomfort in the sector Polista par excellence of Buenos Aires, with access by asphalt and direct descent of motorway.\nLOT OF 1677 M², WITH 24 MTS OF FRONT AND 70 OF FONDO - ASPIRATED CIRCULATING STREETS AND AREAS OF SERVICES - ROAD LIGHTING - OLIMPICAL PERIMETRAL FENCE - SECURITY - INDEPENDENT ACCESS TO SUPPLIERS - ABOUT A PREDIO OF 40 HAS WITH GREEN SPACES, AREAS OF RECREATION AND FOREIGN PROPERTY OF THE AREA - A METERS FROM THE COMMERCIAL CENTER, ASSISTANCE AND POLITICAL DEVELOPMENT OF PETIÓN AND BILINGUAL COLLEGE - LARGE FINANANCING - 35% TO THE BALLOT + FEES - THE OPTION TO IMPROVE YOUR QUALITY OF LIFE, LOMAS DE PETION THE PLACE FOR YOUR HOME .', 'Alejandro Petion, Cañuelas, Mariano Acosta 717', 'Lomas de Petion - OPORTUNIDADE EXCELENTE INVESTIMENTO EM EXCLUSIVO QUINTAS URBANA - A únicos 40 minutos do Obelisco e do Aeroporto Internacional 15 ''Ezeiza entre a proposta Au. Ezeiza Cañuelas e Estrada Nacional 205\nAproveite o ar fresco, livre de ruído e inconveniência jogador de pólo na indústria de excelência em Buenos Aires, com acesso por asfalto e estrada descendência direta.\nLOTE DE 1.677 M², COM 24 MTS FRENTE E 70 DE localizados na base ruas e áreas de serviços atuais -Iluminação estrada asfaltada - OLYMPIC cerca de perímetro - Segurança - Fornecedores de acesso independente - em uma área de 40 hectares, com espaços verdes, áreas de lazer E a própria FLORESTAL ZONE - A metros do Centro, CUIDADOS E POLÍCIA tASK Petion e Escola Bilíngüe - WIDE FINANANCIACIÓN - 35% a QUOTAS DE BILHETES + - opção para melhorar sua qualidade de vida, Lomas de Pétion LUGAR PARA SUA CASA .'),
(2207, '2017-02-26 00:26:36', '2017-03-23 03:05:20', 'S', 75, 11, 'Argentina', 'Buenos Aires', 'Alejandro Petion, Cañuelas', 'Sin Asignar', 'Este', 'Interno', '-34.97775', '-58.66263', 'S', '84000.00', 6, 'N', '0.00', 0, '1677.00', '1677.00', 0, 0, 0, 0, 'Alejandro Petion, Cañuelas, Mariano Acosta 717', 'LOMAS DE PETION - EXCELENTE OPORTUNIDAD DE INVERSIÓN EN EXCLUSIVAS QUINTAS URBANAS - Una propuesta inigualable a 40 minutos del Obelisco y 15'' del Aeropuerto Internacional de Ezeiza, entre la Au. Ezeiza Cañuelas y la Ruta Nacional 205\nDisfrutá del aire puro, libre de ruidos e incomodidades en el sector Polista por excelencia de Buenos Aires, con acceso por asfalto y bajada directa de autopista. \nLOTE DE 1677 M², CON 24 MTS DE FRENTE Y 70 DE FONDO- CALLES CIRCULANTES ASFALTADAS Y AREAS DE SERVICIOS -ILUMINACIÓN VIAL - CERCO PERIMETRAL OLIMPICO - SEGURIDAD - ACCESO INDEPENDIENTE A PROVEEDORES  - SOBRE UN PREDIO DE 40 HAS CON ESPACIOS VERDES, AREAS DE RECREACION Y FORESTACIÓN PROPIA DE LA ZONA - A METROS DEL CENTRO COMERCIAL, ASISTENCIAL Y DESTACAMENTO POLICIAL DE PETIÓN Y COLEGIO BILINGÜE - AMPLIA FINANCIACIÓN - 35% AL BOLETO + CUOTAS - LA OPCIÓN PARA MEJORAR TU CALIDAD DE VIDA, LOMAS DE PETION EL LUGAR PARA TU HOGAR.', 'Alejandro Petion, Cañuelas, Mariano Acosta 717', 'LOMAS DE PETION - EXCELLENT INVESTMENT OPPORTUNITY IN EXCLUSIVE URBAN FACILITIES - An unbeatable proposal 40 minutes from the Obelisk and 15 ''from the International Airport of Ezeiza, between the Au. Ezeiza Cañuelas and the National Route 205\nEnjoy the pure air, free of noise and discomfort in the sector Polista par excellence of Buenos Aires, with access by asphalt and direct descent of motorway.\nLOT OF 1677 M², WITH 24 MTS OF FRONT AND 70 OF FONDO - ASPIRATED CIRCULATING STREETS AND AREAS OF SERVICES - ROAD LIGHTING - OLIMPICAL PERIMETRAL FENCE - SECURITY - INDEPENDENT ACCESS TO SUPPLIERS - ABOUT A PRETTY OF 40 HAS WITH GREEN SPACES, AREAS OF RECREATION AND FOREIGN PROPERTY OF THE AREA - A METERS FROM THE COMMERCIAL CENTER, ASSISTANCE AND POLITICAL DEVELOPMENT OF PETIÓN AND COLLEGE BILINGUAL - LARGE FINANCING - 35% TO THE BALLOT + FEES - THE OPTION TO IMPROVE YOUR QUALITY OF LIFE, LOMAS DE PETION THE PLACE FOR YOUR HOME .', 'Alejandro Petion, Cañuelas, Mariano Acosta 717', 'Lomas de Petion - OPORTUNIDADE EXCELENTE INVESTIMENTO EM EXCLUSIVO QUINTAS URBANA - A únicos 40 minutos do Obelisco e do Aeroporto Internacional 15 ''Ezeiza entre a proposta Au. Ezeiza Cañuelas e Estrada Nacional 205\nAproveite o ar fresco, livre de ruído e inconveniência jogador de pólo na indústria de excelência em Buenos Aires, com acesso por asfalto e estrada descendência direta.\nLOTE DE 1677 m², com 24 MTS FRENTE E 70 DE localizados na base ruas e áreas de serviços atuais -Iluminação estrada asfaltada - OLYMPIC cerca de perímetro - Segurança - Fornecedores de acesso independente - em uma área de 40 hectares, com espaços verdes, áreas de lazer E própria zona florestal - A metros do Centro, CUIDADOS E POLÍCIA tASK Petion e Escola Bilíngüe - financeiro global - 35% a quotas BILHETES + - opção para melhorar sua qualidade de vida, Lomas de Pétion LUGAR PARA SUA CASA .'),
(2208, '2017-02-26 00:26:36', '2017-03-23 03:05:20', 'S', 76, 11, 'Argentina', 'Buenos Aires', 'Alejandro Petion, Cañuelas', 'Sin Asignar', 'Este', 'Interno', '-34.97775', '-58.66263', 'S', '89000.00', 6, 'N', '0.00', 0, '1487.00', '1487.00', 0, 0, 0, 0, 'Alejandro Petion, Cañuelas, Mariano Acosta  717', 'LOMAS DE PETION - EXCELENTE OPORTUNIDAD DE INVERSIÓN EN EXCLUSIVAS QUINTAS URBANAS - Una propuesta inigualable a 40 minutos del Obelisco y 15'' del Aeropuerto Internacional de Ezeiza, entre la Au. Ezeiza Cañuelas y la Ruta Nacional 205\nDisfrutá del aire puro, libre de ruidos e incomodidades en el sector Polista por excelencia de Buenos Aires, con acceso por asfalto y bajada directa de autopista. \nLOTE DE 1487 M², CON 24 MTS DE FRENTE Y 62 DE FONDO- CALLES CIRCULANTES ASFALTADAS Y AREAS DE SERVICIOS -ILUMINACIÓN VIAL - CERCO PERIMETRAL OLIMPICO - SEGURIDAD - ACCESO INDEPENDIENTE A PROVEEDORES  - SOBRE UN PREDIO DE 40 HAS CON ESPACIOS VERDES, AREAS DE RECREACION Y FORESTACIÓN PROPIA DE LA ZONA - A METROS DEL CENTRO COMERCIAL, ASISTENCIAL Y DESTACAMENTO POLICIAL DE PETIÓN Y COLEGIO BILINGÜE - AMPLIA FINANCIACION - 35% AL BOLETO + CUOTAS - LA OPCIÓN PARA MEJORAR TU CALIDAD DE VIDA, LOMAS DE PETION EL LUGAR PARA TU HOGAR.', 'Alejandro Petion, Cañuelas, Mariano Acosta  717', 'LOMAS DE PETION - EXCELLENT INVESTMENT OPPORTUNITY IN EXCLUSIVE URBAN FACILITIES - An unbeatable proposal 40 minutes from the Obelisk and 15 ''from the International Airport of Ezeiza, between the Au. Ezeiza Cañuelas and the National Route 205\nEnjoy the pure air, free of noise and discomfort in the sector Polista par excellence of Buenos Aires, with access by asphalt and direct descent of motorway.\nLOT OF 1487 M², WITH 24 MTS OF FRONT AND 62 OF FONDO - ASFALTED CIRCULATING STREETS AND AREAS OF SERVICES - ROAD LIGHTING - OLIMPICAL PERIMETER FENCE - SECURITY - INDEPENDENT ACCESS TO SUPPLIERS - ABOUT A PREDIO OF 40 HAS WITH GREEN SPACES, AREAS OF RECREATION AND FOREIGN PROPERTY OF THE AREA - A METERS FROM THE COMMERCIAL CENTER, ASSISTANCE AND POLITICAL DEVELOPMENT OF PETIÓN AND COLLEGE BILINGUAL - LARGE FUNDING - 35% TO THE BALLOT + FEES - THE OPTION TO IMPROVE YOUR QUALITY OF LIFE, LOMAS DE PETION THE PLACE FOR YOUR HOME .', 'Alejandro Petion, Cañuelas, Mariano Acosta  717', 'Lomas de Petion - OPORTUNIDADE EXCELENTE INVESTIMENTO EM EXCLUSIVO QUINTAS URBANA - A únicos 40 minutos do Obelisco e do Aeroporto Internacional 15 ''Ezeiza entre a proposta Au. Ezeiza Cañuelas e Estrada Nacional 205\nAproveite o ar fresco, livre de ruído e inconveniência jogador de pólo na indústria de excelência em Buenos Aires, com acesso por asfalto e estrada descendência direta.\nLOTE DE 1.487 M², COM 24 MTS FRENTE E 62 DE localizados na base ruas e áreas de serviços atuais -Iluminação estrada asfaltada - OLYMPIC cerca de perímetro - Segurança - Fornecedores de acesso independente - em uma área de 40 hectares, com espaços verdes, áreas de lazer E própria zona florestal - A metros do Centro, CUIDADOS E POLÍCIA tASK Petion e Escola Bilíngüe - financeiro global - 35% a quotas BILHETES + - opção para melhorar sua qualidade de vida, Lomas de Pétion LUGAR PARA SUA CASA .'),
(2209, '2017-02-26 00:26:37', '2017-03-23 03:05:20', 'S', 77, 11, 'Argentina', 'Buenos Aires', 'Alejandro Petion, Cañuelas', 'Sin Asignar', 'Este', 'Interno', '-34.97775', '-58.66263', 'S', '89000.00', 6, 'N', '0.00', 0, '1487.00', '1487.00', 0, 0, 0, 0, 'Alejandro Petion, Cañuelas, Mariano Acosta 717', 'LOMAS DE PETION - EXCELENTE OPORTUNIDAD DE INVERSIÓN EN EXCLUSIVAS QUINTAS URBANAS - Una propuesta inigualable a 40 minutos del Obelisco y 15'' del Aeropuerto Internacional de Ezeiza, entre la Au. Ezeiza Cañuelas y la Ruta Nacional 205\nDisfrutá del aire puro, libre de ruidos e incomodidades en el sector Polista por excelencia de Buenos Aires, con acceso por asfalto y bajada directa de autopista. \nLOTE DE 1487 M², CON 24 MTS DE FRENTE Y 62 MTS DE FONDO- CALLES CIRCULANTES ASFALTADAS Y AREAS DE SERVICIOS -ILUMINACIÓN VIAL - CERCO PERIMETRAL OLIMPICO - SEGURIDAD - ACCESO INDEPENDIENTE A PROVEEDORES  - SOBRE UN PREDIO DE 40 HAS CON ESPACIOS VERDES, AREAS DE RECREACION Y FORESTACIÓN PROPIA DE LA ZONA - A METROS DEL CENTRO COMERCIAL, ASISTENCIAL Y DESTACAMENTO POLICIAL DE PETIÓN Y COLEGIO BILINGÜE - AMPLIA FINANCIACION - 35% AL BOLETO + CUOTAS - LA OPCIÓN PARA MEJORAR TU CALIDAD DE VIDA, LOMAS DE PETION EL LUGAR PARA TU HOGAR.', 'Alejandro Petion, Cañuelas, Mariano Acosta 717', 'LOMAS DE PETION - EXCELLENT INVESTMENT OPPORTUNITY IN EXCLUSIVE URBAN FACILITIES - An unbeatable proposal 40 minutes from the Obelisk and 15 ''from the International Airport of Ezeiza, between the Au. Ezeiza Cañuelas and the National Route 205\nEnjoy the pure air, free of noise and discomfort in the sector Polista par excellence of Buenos Aires, with access by asphalt and direct descent of motorway.\nLOT OF 1487 M², WITH 24 MTS OF FRONT AND 62 OF FONDO - ASFALTED CIRCULATING STREETS AND AREAS OF SERVICES - ROAD LIGHTING - OLIMPICAL PERIMETER FENCE - SECURITY - INDEPENDENT ACCESS TO SUPPLIERS - ABOUT A PREDIO OF 40 HAS WITH GREEN SPACES, AREAS OF RECREATION AND FOREIGN PROPERTY OF THE AREA - A METERS FROM THE COMMERCIAL CENTER, ASSISTANCE AND POLITICAL DEVELOPMENT OF PETIÓN AND COLLEGE BILINGUAL - LARGE FUNDING - 35% TO THE BALLOT + FEES - THE OPTION TO IMPROVE YOUR QUALITY OF LIFE, LOMAS DE PETION THE PLACE FOR YOUR HOME .', 'Alejandro Petion, Cañuelas, Mariano Acosta 717', 'Lomas de Petion - OPORTUNIDADE EXCELENTE INVESTIMENTO EM EXCLUSIVO QUINTAS URBANA - A únicos 40 minutos do Obelisco e do Aeroporto Internacional 15 ''Ezeiza entre a proposta Au. Ezeiza Cañuelas e Estrada Nacional 205\nAproveite o ar fresco, livre de ruído e inconveniência jogador de pólo na indústria de excelência em Buenos Aires, com acesso por asfalto e estrada descendência direta.\nLOTE DE 1.487 M², COM 24 MTS FRENTE E 62 DE localizados na base ruas e áreas de serviços atuais -Iluminação estrada asfaltada - OLYMPIC cerca de perímetro - Segurança - Fornecedores de acesso independente - em uma área de 40 hectares, com espaços verdes, áreas de lazer E própria zona florestal - A metros do Centro, CUIDADOS E POLÍCIA tASK Petion e Escola Bilíngüe - financeiro global - 35% a quotas BILHETES + - opção para melhorar sua qualidade de vida, Lomas de Pétion LUGAR PARA SUA CASA .'),
(2210, '2017-02-26 00:26:37', '2017-03-23 03:05:20', 'S', 78, 11, 'Argentina', 'Buenos Aires', 'Alejandro Petion ,apeadero Fcgr', 'Sin Asignar', 'Este', 'Frente', '-34.60368', '-58.38156', 'S', '100000.00', 6, 'N', '0.00', 0, '1677.00', '1677.00', 0, 0, 0, 0, 'Alejandro Petion ,apeadero Fcgr, Mariano Acosta 717', 'LOMAS DE PETION - EXCELENTE OPORTUNIDAD DE INVERSIÓN EN EXCLUSIVAS QUINTAS URBANAS - Una propuesta inigualable a 40 minutos del Obelisco y 15'' del Aeropuerto Internacional de Ezeiza, entre la Au. Ezeiza Cañuelas y la Ruta Nacional 205\nDisfrutá del aire puro, libre de ruidos e incomodidades en el sector Polista por excelencia de Buenos Aires, con acceso por asfalto y bajada directa de autopista. \nLOTE DE 1677 M², CON 24 MTS DE FRENTE Y 70 DE FONDO-  CALLES CIRCULANTES ASFALTADAS Y AREAS DE SERVICIOS -ILUMINACIÓN VIAL - CERCO PERIMETRAL OLIMPICO - SEGURIDAD - ACCESO INDEPENDIENTE A PROVEEDORES  - SOBRE UN PREDIO DE 40 HAS CON ESPACIOS VERDES, AREAS DE RECREACION Y FORESTACIÓN PROPIA DE LA ZONA - A METROS DEL CENTRO COMERCIAL, ASISTENCIAL Y DESTACAMENTO POLICIAL DE PETIÓN Y COLEGIO BILINGÜE - AMPLIA FINANANCIACIÓN - 35% AL BOLETO + CUOTAS -  LA OPCIÓN PARA MEJORAR TU CALIDAD DE VIDA, LOMAS DE PETION EL LUGAR PARA TU HOGAR.', 'Alejandro Petion ,apeadero Fcgr, Mariano Acosta 717', 'LOMAS DE PETION - EXCELLENT INVESTMENT OPPORTUNITY IN EXCLUSIVE URBAN FACILITIES - An unbeatable proposal 40 minutes from the Obelisk and 15 ''from the International Airport of Ezeiza, between the Au. Ezeiza Cañuelas and the National Route 205\nEnjoy the pure air, free of noise and discomfort in the sector Polista par excellence of Buenos Aires, with access by asphalt and direct descent of motorway.\nLOT OF 1677 M², WITH 24 MTS OF FRONT AND 70 OF FONDO - ASPIRATED CIRCULATING STREETS AND AREAS OF SERVICES - ROAD LIGHTING - OLIMPICAL PERIMETRAL FENCE - SECURITY - INDEPENDENT ACCESS TO SUPPLIERS - ABOUT A PRETTY OF 40 HAS WITH GREEN SPACES, AREAS OF RECREATION AND FOREIGN PROPERTY OF THE AREA - A METERS FROM THE COMMERCIAL CENTER, ASSISTANCE AND POLITICAL DEVELOPMENT OF PETIÓN AND BILINGUAL COLLEGE - LARGE FINANANCING - 35% TO THE BALLOT + FEES - THE OPTION TO IMPROVE YOUR QUALITY OF LIFE, LOMAS DE PETION THE PLACE FOR YOUR HOME .', 'Alejandro Petion ,apeadero Fcgr, Mariano Acosta 717', 'Lomas de Petion - OPORTUNIDADE EXCELENTE INVESTIMENTO EM EXCLUSIVO QUINTAS URBANA - A únicos 40 minutos do Obelisco e do Aeroporto Internacional 15 ''Ezeiza entre a proposta Au. Ezeiza Cañuelas e Estrada Nacional 205\nAproveite o ar fresco, livre de ruído e inconveniência jogador de pólo na indústria de excelência em Buenos Aires, com acesso por asfalto e estrada descendência direta.\nLOTE DE 1.677 M², COM 24 MTS FRENTE E 70 DE localizados na base ruas e áreas de serviços atuais -Iluminação estrada asfaltada - OLYMPIC cerca de perímetro - Segurança - Fornecedores de acesso independente - em uma área de 40 hectares, com espaços verdes, áreas de lazer E a própria FLORESTAL ZONE - A metros do Centro, CUIDADOS E POLÍCIA tASK Petion e Escola Bilíngüe - WIDE FINANANCIACIÓN - 35% a QUOTAS DE BILHETES + - opção para melhorar sua qualidade de vida, Lomas de Pétion LUGAR PARA SUA CASA .'),
(2211, '2017-02-26 00:26:37', '2017-03-23 03:05:20', 'S', 79, 11, 'Argentina', 'Buenos Aires', 'Alejandro Petion ,apeadero Fcgr', 'Sin Asignar', 'Este', 'Interno', '-34.60368', '-58.38156', 'S', '100000.00', 6, 'N', '0.00', 0, '1677.00', '1677.00', 0, 0, 0, 0, 'Alejandro Petion ,apeadero Fcgr, Mariano Acosta  717', 'LOMAS DE PETION - EXCELENTE OPORTUNIDAD DE INVERSIÓN EN EXCLUSIVAS QUINTAS URBANAS - Una propuesta inigualable a 40 minutos del Obelisco y 15'' del Aeropuerto Internacional de Ezeiza, entre la Au. Ezeiza Cañuelas y la Ruta Nacional 205\nDisfrutá del aire puro, libre de ruidos e incomodidades en el sector Polista por excelencia de Buenos Aires, con acceso por asfalto y bajada directa de autopista. \nLOTE DE 1677 M², CON 24 MTS DE FRENTE Y 70 DE FONDO-  CALLES CIRCULANTES ASFALTADAS Y AREAS DE SERVICIOS -ILUMINACIÓN VIAL - CERCO PERIMETRAL OLIMPICO - SEGURIDAD - ACCESO INDEPENDIENTE A PROVEEDORES  - SOBRE UN PREDIO DE 40 HAS CON ESPACIOS VERDES, AREAS DE RECREACION Y FORESTACIÓN PROPIA DE LA ZONA - A METROS DEL CENTRO COMERCIAL, ASISTENCIAL Y DESTACAMENTO POLICIAL DE PETIÓN Y COLEGIO BILINGÜE - AMPLIA FINANANCIACIÓN - 35% AL BOLETO + CUOTAS -  LA OPCIÓN PARA MEJORAR TU CALIDAD DE VIDA, LOMAS DE PETION EL LUGAR PARA TU HOGAR.', 'Alejandro Petion ,apeadero Fcgr, Mariano Acosta  717', 'LOMAS DE PETION - EXCELLENT INVESTMENT OPPORTUNITY IN EXCLUSIVE URBAN FACILITIES - An unbeatable proposal 40 minutes from the Obelisk and 15 ''from the International Airport of Ezeiza, between the Au. Ezeiza Cañuelas and the National Route 205\nEnjoy the pure air, free of noise and discomfort in the sector Polista par excellence of Buenos Aires, with access by asphalt and direct descent of motorway.\nLOT OF 1677 M², WITH 24 MTS OF FRONT AND 70 OF FONDO - ASPIRATED CIRCULATING STREETS AND AREAS OF SERVICES - ROAD LIGHTING - OLIMPICAL PERIMETRAL FENCE - SECURITY - INDEPENDENT ACCESS TO SUPPLIERS - ABOUT A PRETTY OF 40 HAS WITH GREEN SPACES, AREAS OF RECREATION AND FOREIGN PROPERTY OF THE AREA - A METERS FROM THE COMMERCIAL CENTER, ASSISTANCE AND POLITICAL DEVELOPMENT OF PETIÓN AND BILINGUAL COLLEGE - LARGE FINANANCING - 35% TO THE BALLOT + FEES - THE OPTION TO IMPROVE YOUR QUALITY OF LIFE, LOMAS DE PETION THE PLACE FOR YOUR HOME .', 'Alejandro Petion ,apeadero Fcgr, Mariano Acosta  717', 'Lomas de Petion - OPORTUNIDADE EXCELENTE INVESTIMENTO EM EXCLUSIVO QUINTAS URBANA - A únicos 40 minutos do Obelisco e do Aeroporto Internacional 15 ''Ezeiza entre a proposta Au. Ezeiza Cañuelas e Estrada Nacional 205\nAproveite o ar fresco, livre de ruído e inconveniência jogador de pólo na indústria de excelência em Buenos Aires, com acesso por asfalto e estrada descendência direta.\nLOTE DE 1.677 M², COM 24 MTS FRENTE E 70 DE localizados na base ruas e áreas de serviços atuais -Iluminação estrada asfaltada - OLYMPIC cerca de perímetro - Segurança - Fornecedores de acesso independente - em uma área de 40 hectares, com espaços verdes, áreas de lazer E a própria FLORESTAL ZONE - A metros do Centro, CUIDADOS E POLÍCIA tASK Petion e Escola Bilíngüe - WIDE FINANANCIACIÓN - 35% a QUOTAS DE BILHETES + - opção para melhorar sua qualidade de vida, Lomas de Pétion LUGAR PARA SUA CASA .'),
(2212, '2017-02-26 00:26:37', '2017-03-23 03:05:21', 'S', 80, 11, 'Argentina', 'Buenos Aires', 'Alejandro Petion, Cañuelas', 'Sin Asignar', 'Este', 'Interno', '-34.97775', '-58.66263', 'S', '54500.00', 6, 'N', '0.00', 0, '838.00', '838.00', 0, 0, 0, 0, 'Alejandro Petion, Cañuelas, Mariano Acosta  717', 'LOMAS DE PETION - EXCELENTE OPORTUNIDAD DE INVERSIÓN EN EXCLUSIVAS QUINTAS URBANAS - Una propuesta inigualable a 40 minutos del Obelisco y 15'' del Aeropuerto Internacional de Ezeiza, entre la Au. Ezeiza Cañuelas y la Ruta Nacional 205\nDisfrutá del aire puro, libre de ruidos e incomodidades en el sector Polista por excelencia de Buenos Aires, con acceso por asfalto y bajada directa de autopista. \nLOTE DE 838 M², - CALLES CIRCULANTES ASFALTADAS Y AREAS DE SERVICIOS -ILUMINACIÓN VIAL - CERCO PERIMETRAL OLIMPICO - SEGURIDAD - ACCESO INDEPENDIENTE A PROVEEDORES  - SOBRE UN PREDIO DE 40 HAS CON ESPACIOS VERDES, AREAS DE RECREACION Y FORESTACIÓN PROPIA DE LA ZONA - A METROS DEL CENTRO COMERCIAL, ASISTENCIAL Y DESTACAMENTO POLICIAL DE PETIÓN Y COLEGIO BILINGÜE - AMPLIA FINANANCIACIÓN - 35% AL BOLETO + CUOTAS -  LA OPCIÓN PARA MEJORAR TU CALIDAD DE VIDA, LOMAS DE PETION EL LUGAR PARA TU HOGAR.', 'Alejandro Petion, Cañuelas, Mariano Acosta  717', 'LOMAS DE PETION - EXCELLENT INVESTMENT OPPORTUNITY IN EXCLUSIVE URBAN FACILITIES - An unbeatable proposal 40 minutes from the Obelisk and 15 ''from the International Airport of Ezeiza, between the Au. Ezeiza Cañuelas and the National Route 205\nEnjoy the pure air, free of noise and discomfort in the sector Polista par excellence of Buenos Aires, with access by asphalt and direct descent of motorway.\nLOT OF 838 M², - ASFALT CIRCULATING STREETS AND AREAS OF SERVICES - ROAD LIGHTING - OLIMPICAL PERIMETER FENCE - SECURITY - INDEPENDENT ACCESS TO SUPPLIERS - ABOUT A 40 HAS PRIVATE AREA WITH GREEN SPACES, AREAS OF RECREATION AND OWN AREA OF THE AREA - OF THE COMMERCIAL CENTER, ASSISTANCE AND POLITICAL DEVELOPMENT OF PETIÓN AND BILINGUAL COLLEGE - LARGE FINANANCING - 35% TO THE BALLOT + FEES - THE OPTION TO IMPROVE YOUR QUALITY OF LIFE, LOMAS DE PETION THE PLACE FOR YOUR HOME.\n\n', 'Alejandro Petion, Cañuelas, Mariano Acosta  717', 'Lomas de Petion - OPORTUNIDADE EXCELENTE INVESTIMENTO EM EXCLUSIVO QUINTAS URBANA - A únicos 40 minutos do Obelisco e do Aeroporto Internacional 15 ''Ezeiza entre a proposta Au. Ezeiza Cañuelas e Estrada Nacional 205\nAproveite o ar fresco, livre de ruído e inconveniência jogador de pólo na indústria de excelência em Buenos Aires, com acesso por asfalto e estrada descendência direta.\nLOTE DE 838 M² - pavimentadas ruas e áreas de serviços atuais -Iluminação Road - cerca do perímetro olímpico - SEGURANÇA - Fornecedores de acesso independente - em uma área de 40 TEM COM ESPAÇO VERDE, área de lazer e FLORESTAL ZONE PRÓPRIO - A METROS The Mall, CUIDADOS E POLÍCIA tASK Petion e Escola Bilíngüe - WIDE FINANANCIACIÓN - 35% + Ticket to QUOTAS - opção para melhorar sua qualidade de vida, Lomas de Pétion LUGAR PARA SUA CASA.'),
(2213, '2017-02-26 00:26:37', '2017-03-23 03:05:21', 'S', 85, 11, 'Argentina', 'Buenos Aires', 'San Vicente', 'Sin Asignar', 'Sin Informar', 'Sin Informar', '-34.97845', '-58.46783', 'S', '29000.00', 6, 'N', '0.00', 0, '624.00', '624.00', 0, 0, 0, 0, 'San Vicente, Ruta 58  Km 14', 'Lote de terreno en Barrio Aeris sobre  Ruta 58, KM. 14 de 624m² a metros del Club House y la laguna!! Barrio Aeris : sobre una superficie de 40 hectáreas Aeris cuenta con 344 unidades. \nGran espejo de agua con laguna privada de 7 hectáreas- Seguridad exclusiva las 24hs – calles asfaltadas – cerco perimetral olímpico- Club house – Canchas de futbol y tenis – pileta. \nAdemás el barrio contara con  un centro comercial.  Zona de gran crecimiento- Gran oportunidad- No dudes en consultar!\n', 'San Vicente, Ruta 58  Km 14', '', 'San Vicente, Ruta 58  Km 14', ''),
(2214, '2017-02-26 00:26:38', '2017-03-23 03:05:21', 'S', 86, 11, 'Argentina', 'Buenos Aires', 'Ministro Rivadavia', 'Sin Asignar', 'Sin Informar', 'Sin Informar', '-34.82857', '-58.34309', 'S', '500000.00', 6, 'N', '0.00', 0, '0.00', '120000.00', 0, 0, 0, 0, 'Ministro Rivadavia, 25 De Mayo  2500', 'Lote de terreno de 12 hectáreas sobre calle 25 de Mayo con salida a Narciso Laprida. Terrenos de quintas, con forestación antero-posterior con apertura a calle lateral. – Zona de clubes deportivos  de diferentes disciplinas y viveros.  Acceso pavimentado- Gran oportunidad para inversión, no se la pierda!!!! ', 'Ministro Rivadavia, 25 De Mayo  2500', '', 'Ministro Rivadavia, 25 De Mayo  2500', ''),
(2215, '2017-02-26 00:26:38', '2017-03-23 03:05:21', 'S', 90, 11, 'Argentina', 'Buenos Aires', 'San Vicente', 'Sin Asignar', 'Sin Informar', 'Sin Informar', '-35.03386', '-58.45756', 'S', '35000.00', 6, 'N', '0.00', 0, '0.00', '0.00', 0, 0, 0, 0, 'San Vicente, Ruta Nacional  58 Km 16 ', 'Importante lote de 960 m² en barrio San Lucas de San Vicente. Ambiente especial para alejarse de la rutina, la monotonía, con lagunas de recreación donde se pueden realizar deportes náuticos a vela ( sin motor) y pesca deportiva. Canchas de futbol 5 y 11, canchas de tenis de polvo de ladrillo, área de juegos infantiles, club house y vestuarios.  Los servicios esenciales están cubiertos con calles pavimentadas, distribución general de agua potable, distribución subterránea de electricidad y gas, cloacas con tratamiento de efluentes. Cuenta con cerco perimetral olímpico y  seguridad privada. \nProyecto de Centro Comercial en construcción frente al barrio. A  solo 10 minutos de hipermercado Coto de Canning y 7 minutos de centro de Canning (cine, teatro, centros comerciales, y centros gastronómicos y centros de salud). Fácil y rápido acceso a La Autopista Ezeiza- Cañuelas y Richeri, tan solo 10 minutos y 40 del obelisco.\n', 'San Vicente, Ruta Nacional  58 Km 16 ', '', 'San Vicente, Ruta Nacional  58 Km 16 ', ''),
(2216, '2017-02-26 00:26:39', '2017-03-23 03:05:22', 'S', 92, 11, 'Argentina', 'Buenos Aires', 'Cañuelas', 'Sin Asignar', 'Sin Informar', 'Sin Informar', '-35.04914', '-58.75951', 'S', '60000.00', 6, 'N', '0.00', 0, '0.00', '1487.00', 0, 0, 0, 0, 'Cañuelas, Mariano Acosta 717', 'LOMAS DE PETION - EXCELENTE OPORTUNIDAD DE INVERSIÓN EN EXCLUSIVAS QUINTAS URBANAS - Una propuesta inigualable a 40 minutos del Obelisco y 15'' del Aeropuerto Internacional de Ezeiza, entre la Au. Ezeiza Cañuelas y la Ruta Nacional 205\nDisfrutá del aire puro, libre de ruidos e incomodidades en el sector Polista por excelencia de Buenos Aires, con acceso por asfalto y bajada directa de autopista. \nLOTE DE 1487 M², CON 24 MTS DE FRENTE Y 62 MTS DE FONDO- CALLES CIRCULANTES ASFALTADAS Y AREAS DE SERVICIOS -ILUMINACIÓN VIAL - CERCO PERIMETRAL OLIMPICO - SEGURIDAD - ACCESO INDEPENDIENTE A PROVEEDORES  - SOBRE UN PREDIO DE 40 HAS CON ESPACIOS VERDES, AREAS DE RECREACION Y FORESTACIÓN PROPIA DE LA ZONA - A METROS DEL CENTRO COMERCIAL, ASISTENCIAL Y DESTACAMENTO POLICIAL DE PETIÓN Y COLEGIO BILINGÜE - AMPLIA FINANCIACION - 35% AL BOLETO + CUOTAS - LA OPCIÓN PARA MEJORAR TU CALIDAD DE VIDA, LOMAS DE PETION EL LUGAR PARA TU HOGAR.', 'Cañuelas, Mariano Acosta 717', '', 'Cañuelas, Mariano Acosta 717', ''),
(2217, '2017-02-26 00:26:39', '2017-03-23 03:05:22', 'S', 99, 11, 'Argentina', 'Buenos Aires', 'Monte Grande', 'Centro', 'Sin Informar', 'Sin Informar', '-34.82806', '-58.45562', 'S', '75000.00', 6, 'N', '0.00', 0, '0.00', '300.00', 0, 0, 0, 0, 'Monte Grande, Gral. Rodriguez  1470', 'OPORTUNIDAD!! ULTIMO LOTE EN MANZANA, EXELENTE UBICACIÓN!!! Lote de 10 x 30 metros en zona residencial (R3) con mejoras. Servicios: Electricidad, gas natural y agua corriente. Cloacas Proximamente. Pequeño departamento de dos ambientes a reciclar o demoler compuesto por cocina, dormitorio y baño. No dudes en consultar!!!', 'Monte Grande, Gral. Rodriguez  1470', 'OPPORTUNITY!! LAST LOT IN APPLE, EXCELLENT LOCATION !!! Lot of 10 x 30 meters in residential area (R3) with improvements. Services: Electricity, natural gas and running water. Cloacas Coming soon. Small apartment of two rooms to recycle or demolish composed by kitchen, bedroom and bathroom. Do not hesitate to consult !!!', 'Monte Grande, Gral. Rodriguez  1470', 'OPORTUNIDADE !! Último lote para a Apple, EXCELENTE LOCALIZAÇÃO !!! Lote de 10 x 30 metros da área residencial (R3) com melhorias. Serviços: electricidade, gás natural e água corrente. Próximos esgotos. Pequeno apartamento de dois quartos para reciclar ou demolir composto por cozinha, quarto e banheiro. Sinta-se livre para verificar !!!'),
(2218, '2017-02-26 00:26:39', '2017-03-23 03:05:22', 'S', 100, 11, 'Argentina', 'Buenos Aires', 'Canning', 'Canning', 'Sin Informar', 'Sin Informar', '-34.85469', '-58.50493', 'S', '79000.00', 6, 'N', '0.00', 0, '0.00', '423.00', 0, 0, 0, 0, 'Canning, Teniente Giriboni  822', 'LOTE DE 10 X 42  EN CANNING, INMEJORABLE UBICACIÓN!! A METROS DE "LAS TOSCAS SHOPPING!!" \nFOT: 0,6 / FOS: 0,5 / ZONA R4a. \nElectricidad- gas natural- carece de agua corriente.\nPegado a Ceramicos Canning. ', 'Canning, Teniente Giriboni  822', 'LOT OF 10 X 42 IN CANNING, UNBEATABLE LOCATION !! A METROS FROM "TOSCAS SHOPPING !!"\nFOT: 0.6 / FOS: 0.5 / ZONE R4a.\nElectricity - natural gas - lacks running water.\nAttached to Ceramic Canning.', 'Canning, Teniente Giriboni  822', 'Lote de 10 X 42 em Canning, excelente localização !! A METROS DE "THE Toscas COMPRA !!"\nFOT: 0.6 / FOS: 0,5 / ZONE R4a.\ngás natural Elettricità-, sem água corrente.\nColado ao Ceramicos Canning.'),
(2219, '2017-02-26 00:26:39', '2017-03-23 03:05:22', 'S', 119, 11, 'Argentina', 'Buenos Aires', 'Monte Grande', 'Centro', 'Sin Informar', 'Sin Informar', '-34.82762', '-58.46777', 'S', '140000.00', 6, 'N', '0.00', 0, '0.00', '1039.00', 0, 0, 0, 0, 'Monte Grande, Lagarreta 464', 'Venta de 2 lotes en block. Cada Uno de 8.66 x  60 mtrs.  Total:  17.32 x 60 mtrs  Sup Total  1.039 m2.  Lote c/ mejoras ( construcción precaria). Ubicación calle Legarreta al 400 entre Gral  Paz y C. Pellegrini.  A 500 mtrs de Av. Santamarina, a 400 mtrs de Av. Alem  y a 900 mtrs de Estación Monte Grande .  Servicios: Asfalto, Agua cte., Luz, Gas Natural. Consulte!!', 'Monte Grande, Lagarreta 464', '', 'Monte Grande, Lagarreta 464', ''),
(2220, '2017-02-26 00:26:39', '2017-03-23 03:05:23', 'S', 124, 11, 'Argentina', 'Buenos Aires', 'El Jaguel ,partido Esteban Echeverria', 'Sin Asignar', 'Sin Informar', 'Sin Informar', '-34.82542', '-58.50812', 'S', '600000.00', 6, 'N', '0.00', 0, '501.00', '821.00', 0, 0, 0, 0, 'El Jaguel ,partido Esteban Echeverria, Avenida Jorge Newbery  130/140', 'Imperdible Oportunidad en Ezeiza a metros de la Autopista!!!!! Amplio local con oficinas y/o vivienda sobre importante calle comercial a metros de la Autoista Ezeiza Cañuelas construidos sobre tres lotes. Cuenta con amplio salón de ventas en recepción de 63,72 m² de acceso al salón principal de 141,16 m², con cocina de 26 m², una cámara de 4,86 m², baños de damas, caballeros y discapacitados, un tercer local de parrillas de 89,18 m² cuarto de enseres de 16,96 m². Planta alta dos oficinas, archivo y dos baños. \nSup Cub. PB: 433,84 metros; Sup. Cub. PA: 67,50 m²\nFOS= 52,77%; FOT_ 60,99% Z R4a; Ancho Calle 20 metros, Vereda 2,40 metros\nLa comercialización de este inmueble está sujeta a la tramitación del COTI por la parte propietaria', 'El Jaguel ,partido Esteban Echeverria, Avenida Jorge Newbery  130/140', '', 'El Jaguel ,partido Esteban Echeverria, Avenida Jorge Newbery  130/140', ''),
(2221, '2017-02-26 00:26:40', '2017-03-23 03:05:23', 'S', 129, 11, 'Argentina', 'Buenos Aires', 'Tristan Suarez', 'Tristan Suarez', 'Sin Informar', 'Sin Informar', '-34.89821', '-58.50942', 'S', '2000000.00', 6, 'N', '0.00', 0, '385155.00', '385155.00', 0, 0, 0, 0, 'Tristan Suarez, Ruta Provincial 52 3000', 'Fraccion 40 Has- Salida a la ruta- Ideal emprendimiento inmobiliario- Proximo a La Providencia. Consulte opciones! ', 'Tristan Suarez, Ruta Provincial 52 3000', '', 'Tristan Suarez, Ruta Provincial 52 3000', 'PDA inmobiliaria 130-71774'),
(2222, '2017-02-26 00:26:40', '2017-03-23 03:05:23', 'S', 238, 11, 'Argentina', 'Buenos Aires', 'Guernica', 'Presidente Perón', 'Sureste', 'Interno', '-34.88609', '-58.50512', 'S', '65000.00', 6, 'N', '0.00', 0, '837.00', '837.00', 0, 0, 0, 0, 'Guernica, Ruta 58 11000', 'Espectacular lote en Barrio Privado El Rebenque de 837 m² a metros del Club House. Barrio consolidado con servicios subterráneos de electricidad, gas, teléfono, internet, agua corriente y cloacas. Calles pavimentadas. Seguridad las 24 hs, cerco perimetral. Cuenta con Piletas para adultos, niños y climatizada. Spa, sauna y gimnasio. 5 canchas de tennis, cancha de futbol, hockey y voley. SUM y plazas deportivas y de juegos para niños. Expensas promedio $4,500. Imperdible!', 'Guernica, Ruta 58 11000', '', 'Guernica, Ruta 58 11000', ''),
(2223, '2017-02-26 00:26:40', '2017-03-23 03:05:24', 'S', 248, 11, 'Argentina', 'Buenos Aires', 'Monte Grande', 'Centro', 'Suroeste', 'Frente', '-34.84938', '-58.44871', 'S', '50000.00', 6, 'N', '0.00', 0, '119.00', '317.00', 0, 2, 0, 0, 'Monte Grande, Azul 317', 'OPORTUNIDAD DE INVERSION - Lote con 3 locales al frente a metros del Club Israelita Sefardí de Monte Grande. \nLocales de 3,35 metros de frente por 9,70 metros de fondo con persianas de malla ciega. Pendientes detalles de terminación. Posibilidad de ampliación en planta alta o modificación a vivienda, losa de contrucción sólida. Escaleras a terraza. Consulte opciones!!!!', 'Monte Grande, Azul 317', '', 'Monte Grande, Azul 317', ''),
(2224, '2017-02-26 00:26:41', '2017-03-23 03:05:24', 'S', 52, 12, 'Argentina', 'Buenos Aires', 'Ezeiza', 'Sin Asignar', 'Suroeste', 'Frente', '-34.85614', '-58.52468', 'N', '0.00', 0, 'S', '3700.00', 5, '32.00', '34.00', 0, 1, 2, 0, 'Ezeiza, José M. Ezeiza  109', 'salón único con Kitchenet integrada, compuesta de mesada de mármol granítico con doble bacha y grifería tipo monocomando de agua fría y caliente. Mueble bajo mesada con puertas abatibles y cajonera. Anafe tipo vitrocerámico de dos elementos. Alacena de un estante con puertas abatibles. Temotanque de 30 litros eléctrico marca "Volcan". Baño completo con lavatorio emportado con grifería monocomando, bañera con cuadro de ducha completo; inodoro con depósito de agua por mochila y bidet. Salida a balcón por puerta balcon de doble hoja corredera.\n\nCódigo. Mapaprop: 3191-702\n\nCódigo Inmomap: 0019753', 'Ezeiza, José M. Ezeiza  109', '', 'Ezeiza, José M. Ezeiza  109', 'Oficinas en J.M. Ezeiza y RN 205 desde 34,42 m² con balcón, kitchenette y baño completo. Detalles de calidad, muy luminosas, en 1º y 2º piso. El edificio incluye salón de usos múltiples y terraza libre para organizar eventos. Excelente ubicación a metros de la Municipalidad y Estación de Trenes de Ezeiza.');
INSERT INTO `propiedades` (`id`, `fecha_creado`, `fecha_modificado`, `activo`, `profit_id`, `tipo_propiedad`, `pais`, `provincia`, `localidad`, `zona`, `orientacion`, `ubicacion`, `loc_lat`, `loc_long`, `en_venta`, `precio_venta`, `moneda_venta_id`, `en_alquiler`, `precio_alquiler`, `moneda_alquiler_id`, `sup_cubierta`, `sup_total`, `cant_habitaciones`, `cant_banos`, `cant_cocheras`, `antiguedad`, `titulo_es`, `descripcion_es`, `titulo_en`, `descripcion_en`, `titulo_pt`, `descripcion_pt`) VALUES
(2225, '2017-02-26 00:26:41', '2017-03-23 03:05:24', 'S', 63, 12, 'Argentina', 'Buenos Aires', 'Ezeiza', 'Sin Asignar', 'Noroeste', 'Frente', '-34.85614', '-58.52468', 'N', '0.00', 0, 'S', '5000.00', 5, '54.00', '0.00', 0, 0, 0, 0, 'Ezeiza, José M. Ezeiza 109', 'Oficina/Monoambiente a estrenar con vistas a la Municipalidad de Ezeiza. A metros de la estación de trenes. Esquina RN 205. Muy luminoso. \nIntegrado por un ambiente único con kitchenette, termotanque  y anafe electrico.\nAmplia terraza - Balcón semicerrada. \nSUM y Parrilla. Simplemente GENIAL!\nApto profesional/Vivienda', 'Ezeiza, José M. Ezeiza 109', '', 'Ezeiza, José M. Ezeiza 109', ''),
(2226, '2017-02-26 00:26:41', '2017-03-23 03:05:25', 'S', 65, 12, 'Argentina', 'Buenos Aires', 'Ezeiza', 'Sin Asignar', 'Noroeste', 'Frente', '-34.85614', '-58.52468', 'N', '0.00', 0, 'S', '4000.00', 5, '50.00', '0.00', 0, 0, 0, 0, 'Ezeiza, José M. Ezeiza 109', 'Oficina/Monoambiente a estrenar con vistas a la Municipalidad de Ezeiza. A metros de la estación de trenes. Esquina RN 205. Muy luminoso. \nIntegrado por un ambiente único con kitchenette, termotanque  y anafe electrico.\nAmplia terraza - Balcón semicerrada. \nSUM y Parrilla. Simplemente GENIAL!\nApto profesional/Vivienda', 'Ezeiza, José M. Ezeiza 109', '', 'Ezeiza, José M. Ezeiza 109', ''),
(2227, '2017-02-26 00:26:41', '2017-03-23 03:05:25', 'S', 240, 0, 'Argentina', 'Buenos Aires', 'Monte Grande', 'Centro', 'Sureste', 'Frente', '-34.82687', '-58.46009', 'S', '190000.00', 6, 'N', '0.00', 0, '164.00', '252.00', 2, 0, 1, 25, 'Monte Grande, Leandro N. Alem 1225', 'OPORTUNIDAD- Casa con local en importante zona comercial de Monte Grande.\nPB: LOCAL: de 60,53 m², 6,95 m² de frente por 8,05 m² de fondo con persianas de malla ciega y puerta de escape. Actualmente alquilado. COCHERA: Acceso principal a vivienda en planta alta. Pisos cerámicos, portón corredizo al frente y abatible al fondo con acceso a jardin posterior. \nPA: VIVIENDA: Acceso por escalera con living comedor con acceso a balcón frontal; cocina amoblada con muebles bajo mesada y alacenas, lavadero con termotanque de cerramiento vidriado al frente. Terraza con vistas a Avenida Alem. Dos dormitorios, uno de 3,40 metros x 3,80 metros y otro de 2,45 metros x 2,05 metros. Posible permuta por departamentos en la costa. Escucha opciones. Consulte!', 'Monte Grande, Leandro N. Alem 1225', '', 'Monte Grande, Leandro N. Alem 1225', ''),
(2228, '2017-02-26 00:26:42', '2017-03-23 03:05:25', 'S', 118, 13, 'Argentina', 'Buenos Aires', 'Monte Grande', 'Centro', 'Sin Informar', 'Frente', '-34.81171', '-58.46588', 'S', '145000.00', 6, 'N', '0.00', 0, '100.00', '150.00', 2, 0, 1, 0, 'Monte Grande, Ocantos  347', 'Duplex al frente. En Planta Baja: Entrada de autos descubierta, living c/ pisos ceramicos, cocina equipada c/ pasaplatos, toilette, patio con parrilla y amplio fondo libre. En Planta Alta: 2 dormitorios con placard, baño completo. VENTA DIRECTA.  Estado General: Muy bueno. Ubicación: Entre calles Sarmiento y E. Echeverria. A 300 mtrs de Estación Monte Grande. ', 'Monte Grande, Ocantos  347', '', 'Monte Grande, Ocantos  347', ''),
(2229, '2017-02-26 00:26:42', '2017-03-23 03:05:25', 'S', 241, 13, 'Argentina', 'Buenos Aires', 'Monte Grande', 'Centro', 'Noreste', 'Frente', '-34.82315', '-58.45927', 'S', '90000.00', 6, 'N', '0.00', 0, '58.00', '58.00', 2, 1, 1, 0, 'Monte Grande, Reconquista  187', 'Excelente Duplex a estrenar compuesto por: \nPrimer piso: Amplio estar-comedor con pisos de porcelanato- Cocina equipada con muebles bajo mesada en melamina blanca con detalles en aluminio y  pisos de porcelanato.- Balcon al  contra frente.\nSegundo piso:  1°Dormitorio de 3x3,10 mts con piso flotante y placard empotrado-2° dormitorio de 2,40x3,10 mts con pisos flotantes y placard empotrado- Baño completo, con griferia FV. \nCochera en planta baja . Consulte por financiacion!! ', 'Monte Grande, Reconquista  187', '', 'Monte Grande, Reconquista  187', ''),
(2230, '2017-02-26 00:26:42', '2017-03-23 03:05:26', 'S', 245, 0, 'Argentina', 'Buenos Aires', 'Canning', 'Canning', 'Sureste', 'Interno', '-34.85648', '-58.50987', 'S', '145000.00', 6, 'N', '0.00', 0, '0.00', '0.00', 2, 0, 1, 5, 'Canning, Racedo 780', 'Luminoso dúplex en Casuarinas IV con playroom. Garage pasante par dos autos, patio trasero y galeria cubierta.\nPB: Cocina amoblada con pasaplatos, comedor, living y estudio integrados, toilette de recepción; PA: dos dormitorios con vestidor, baño completo. Inmejorable ubicación en el barrio. A metros del ingreso principal. Cerramiento independiente, muy bueno!!!!', 'Canning, Racedo 780', '', 'Canning, Racedo 780', ''),
(2231, '2017-02-26 00:26:43', '2017-03-23 03:05:26', 'S', 82, 14, 'Argentina', 'Buenos Aires', 'Ezeiza', 'Sin Asignar', 'Sin Informar', 'Sin Informar', '-34.88822', '-58.51437', 'S', '480000.00', 6, 'S', '25000.00', 5, '63.00', '10120.00', 0, 0, 0, 0, 'Ezeiza, Galeano  3896', 'QUINTA CON FRENTE A LA CALLE GALEANO ESQUINA MONTES DE OCA ENTRE CALLE HIPOCRATES. CONSTITUIDA POR DOS LOTES DE 5060 mt² CADA UNO, CASA QUINTA DE 63mt² CONSTRUIDOS Y GALPONES MONTADOS,  GRAN ARBOLEDA, DELIMITACION PERIMETRAL Y CERCO COLINDANTE ZONA DE INTERÉS PARA DESARROLLO INMOBILIARIO. AMPLIA RED DE CONSTRUCCIÓN SOBRE MONTES DE OCA DIRECCIÓN MARIANO CASTEX, A 300 METROS DEL INMUEBLE. IDEAL INVERSIONISTAS PARA DESARROLLO INMOBILIARIO. SE OFRECE POSIBILIDAD DE LOCACIÓN PARA OBRADOR, DEPOSITO DE MATERIALES O DESTINOS SIMILARES.', 'Ezeiza, Galeano  3896', 'FIFTH WITH FRONT TO THE GALEANO STREET CORNER MONTES OF OCA BETWEEN HYPOCRATES STREET. CONSTITUTED BY TWO LOTS OF 5060 m ² EACH, HOUSE FIFTEEN OF BUILT AREAS 63mt² AND GROUNDS, GREAT GROVE, PERIMETRAL DELIMITATION AND CERK COLINDANTE AREA OF INTEREST FOR REAL ESTATE DEVELOPMENT. WIDE CONSTRUCTION NETWORK ON MONTES DE OCA DIRECTION MARIANO CASTEX, 300 METERS FROM THE PROPERTY. IDEAL INVESTORS FOR REAL ESTATE DEVELOPMENT. IS POSSIBILITY OF LOCATION FOR OBRADOR, DEPOSIT OF MATERIALS OR SIMILAR DESTINATIONS.', 'Ezeiza, Galeano  3896', 'QUINTA RUA COM FRENTE DE CANTO GALEANO Montes de Oca rua entre Hipócrates. Dois conjuntos FEITOS DE CADA mt² 5060, 63mt² QUINTA casa construída e lança MONTADO, GREAT GROVE, CERCA Delimitação perímetro ea área adjacente de interesse para o desenvolvimento imobiliário. CONSTRUÇÃO EM LARGA endereço de rede MARIANO Montes de Oca CASTEX, a 300 metros PROPRIEDADE. IDEAL PARA INVESTIDORES incorporação imobiliária. POSSIBILIDADE DE LEASING ESTÁ PREVISTO Obrador, materiais de depósito ou DESTINOS semelhante.'),
(2232, '2017-02-26 00:26:43', '2017-03-23 03:05:26', 'S', 235, 14, 'Argentina', 'Buenos Aires', 'San Vicente', 'Sin Asignar', 'Sureste', 'Frente', '-35.01697', '-58.41171', 'S', '120000.00', 6, 'N', '0.00', 0, '107.00', '1215.00', 1, 1, 1, 60, 'San Vicente, Juan Domingo Perón 972', '\nDistribución en una planta. Hall semicubierto de acceso a living con pisos mosaicos, ventana de tres hojas, dos fijas y una abatible con persianas de PVC. Pasillo distribuidor con abertura a cocina con muebles bajo mesada, revestimiento cerámico dos tercios, con ventilación e iluminacion natural por ventana de 0,90 x 1,50 metros y pisos mosaicos. Baño incompleto con lavatorio, ducha e inodoro. Amplio lavadero con pileta de lavado revestida con ceramicos y mesada de obra con reversimiento granítico. Patio trasero con piso de lajas. Pasillo con motorbombeador y cabina de gas. Horno de barro. Jardín trasero con amplia vegetación. Falta delimitación linderos con parcela', 'San Vicente, Juan Domingo Perón 972', 'Valuación Terreno: 30618\nValuación Construcción: 6321\n', 'San Vicente, Juan Domingo Perón 972', ''),
(2233, '2017-03-23 02:42:25', '2017-03-23 03:05:13', 'S', 105, 3, 'Argentina', 'Buenos Aires', 'Canning', 'Canning', 'Sin Informar', 'Sin Informar', '-34.84817', '-58.49231', 'S', '176000.00', 6, 'N', '0.00', 0, '200.00', '0.00', 0, 0, 0, 30, 'Canning, Avenida Pedro Dreyer 3539', 'Casa construida sobre un lote de 1043 m² resuelta en 2 plantas con terraza y piscina. PB: Acceso por entrada principal al frente con acceso por hall de recepción a comedor  y living en desnivel con separación de ambientes por arcos, muy buena iluminación y ventilación natural. Dos dormitorios, uno con baño en suite completo con cuadro de ducha. Cocina con mueble bajo mesada, bacha doble con grifería tipo monocomando, ventilación e iluminación natural por ventana corredera de dos hojas. Lavadero con puerta vaivén de madera con revestimiento  cerámico con acceso a patio exterior  y jardín. Garaje cubierto para un coche. \nPA: Acceso por escalera desde el comedor , living con vista a terraza, dos dormitorios con placard empotrado a la pared piso-techo, cocina equipada con muebles bajo mesada y alacena superior. Baño completo y toilette con inodoro y espacio de ducha. Acceso a escalera exterior y terraza por puerta balcón. \nSup cubierta: 200 m²\nLibre: 800 m²\nSup total lote: 1043 m²\n', 'Canning, Avenida Pedro Dreyer 3539', 'House built on a lot of 1043 m² resolved on 2 floors with terrace and pool. PB: Access by main entrance to the front with access by hall from reception to dining room and living in unevenness with separation of environments by arches, very good lighting and natural ventilation. Two bedrooms, one with en suite bathroom with shower box. Kitchen with furniture under table, double bacha with taps type monocomando, ventilation and natural lighting by sliding window of two leaves. Utility room with wooden swing door with ceramic coating with access to outside patio and garden. Covered garage for one car.\nPA: Access by stairs from the dining room, living room with view to terrace, two bedrooms with wardrobe / closet recessed to the wall floor-ceiling, kitchen equipped with furniture under table and upper cupboard. Full bathroom and toilet with toilet and shower space. Access to outside staircase and terrace by balcony door.\nSup deck: 200 m²\nFree: 800 m²\nSup total lot: 1043 m²', 'Canning, Avenida Pedro Dreyer 3539', 'Casa construída em um terreno de 1043 m² resolvida em 2 pisos com terraço e piscina. PB: O acesso à entrada principal da frente com uma sala de recepção e de dois andares sala de estar com separação de ambientes arcos, muito boa iluminação e ventilação natural. Dois quartos, um com casa de banho casa de banho completa com cabine de duche. móveis de cozinha sob a mesa, pia dupla com único tipo de manípulo da torneira, ventilação e iluminação natural janela deslizante de duas folhas. Utilitário quarto com porta de balanço de madeira com revestimento cerâmico com acesso ao pátio exterior e jardim. garagem coberta para um carro.\nPA: passos da sala de jantar, sala de estar com vista para terraço, dois quartos com roupeiro encastrado chão para a parede, teto, equipado com mobiliário sob a mesa e armário de cozinha superior. toilette e casa de banho completa com WC e chuveiro espaço. O acesso por escada externa e porta do terraço varanda.\nÁrea coberta: 200 m²\nGratuitas: 800 m²\nmonte Área Total: 1043 m²'),
(2234, '2017-03-23 02:42:30', '2017-03-23 03:05:18', 'S', 255, 3, 'Argentina', 'Buenos Aires', 'Monte Grande', 'Centro', 'Noreste', 'Frente', '-34.83058', '-58.45898', 'S', '120000.00', 6, 'N', '0.00', 0, '0.00', '250.00', 2, 1, 1, 0, 'Monte Grande, Vicente López 1523', 'Casa sobre un lote de 10 x 25 metros, esta ubicada entre Sante Fe y Pedro Dreyer, sobre Vicente López. Es una manzana elevada respecto de otras de la zona, lo que asegura imposibilidad de inundaciones y resguardo ante eventuales accidentes de circulación vial.\nLa construcción es sólida, con buenas bases y losa en techos. Lo que permite construir en altura a gusto, en una planta superior. \nTiene un retiro de frente de 4,3 metros y se puede acceder por cochera o bien por la puerta principal. La cocina esta totalmente amoblada y cuenta con un esquinero de obra para aprovechar espacios, con mueble bajo mesada y alacenas más un mueble adicional para guardar enseres. El comedor es de dimensiones apropiadas para una mesa familiar de 6 miembros, da hacia el despensero por su parte posterior, que a su vez da acceso al patio trasero.\nTiene dos dormitorios amplios con techos altos uno con ventana al frente y el otro al contrafrente. El distribuidor es amplio y lleva al baño, que es completo con cuadro de ducha. Desde la entrada principal se accede a la vivienda por el living, que bien podría transformarse en un tercer dormitorio, amplio y con miras a diseñar un baño en suite.\n\nEl patio trasero da a la escalera que lleva a terraza. Bajo techo se encuentra el lavadero semicubierto y el termotanque. Tambien se puede acceder a un deposito con techo de chapa con columnas para levantar paredes transformandolo en un departamento o bien en un quincho con parrilla. Existe un segundo deposito con instalaciones sanitarias para lavadero o bien un segundo baño. Es muy luminosa y su estado es muy bueno. Se escuchan opciones por tanto no dudes en consultar!', 'Monte Grande, Vicente López 1523', 'House on a plot of 10 x 25 meters, is located between Santa Fe and Pedro Dreyer, Vicente Lopez. It is high in relation to other apple areas, guaranteeing the impossibility of flooding and protection against possible road accidents.\nThe construction is solid, with good foundation and slab ceilings. Allowing height of the building to taste, on an upper floor.\nIt has a retreat in front of 4.3 meters and can be accessed by garage or the front door. The kitchen is fully furnished and has a cornerback work to take advantage of the spaces with furniture under the table and cabinets plus an additional cabinet to store belongings. The dining room is suitable for a family sized table of 6 members, facing the butler for the back, which in turn gives access to the backyard.\nIt has two large rooms with high ceilings one window to the front and the other part of the building. The distributor is large and leads to the bathroom, which is complete with shower cubicle. From the main entrance is accessed by living accommodation which could very well become a third bedroom, spacious and with a view to creating a bathroom.\n\nThe backyard overlooks the staircase leading to the terrace. Under the roof is partially covered with laundry and hot water tank. You can also access a zinc roofed deposit with columns for building walls by turning it into an apartment or a barbecue. A second tank with toilet facilities for the laundry room or a second bathroom. It is very bright and its condition is very good. Therefore, listen see options!', 'Monte Grande, Vicente López 1523', 'Casa em um terreno de 10 x 25 metros, está localizado entre Santa Fé e Pedro Dreyer, Vicente Lopez. É elevado em relação a outras áreas de maçã, garantindo impossibilidade de inundações e proteção contra possíveis acidentes de viação.\nA construção é sólida, com bons fundamentos e tectos da laje. Permitindo altura do edifício a gosto, em um andar superior.\nTem um retiro na frente de 4,3 metros e pode ser acessado por garagem ou pela porta da frente. A cozinha está completamente mobilado e tem um trabalho cornerback para tirar proveito dos espaços com móveis debaixo da mesa e armários mais um gabinete adicional para guardar pertences. A sala de jantar é adequado para uma mesa tamanho família de 6 membros, enfrenta o mordomo para as costas, que por sua vez dá acesso ao quintal.\nEle tem dois grandes quartos com tectos altos uma janela para a frente ea outra parte do edifício. O distribuidor é grande e leva à casa de banho, que se completa com cabine de duche. A partir da entrada principal é acessado pelo alojamento viva, que poderia muito bem se tornar um terceiro quarto, espaçoso e com vista à criação de uma casa de banho.\n\nO quintal tem vista para a escadaria que leva ao terraço. Sob o telhado está parcialmente coberto de lavandaria e tanque de água quente. Você também pode acessar um depósito com telhado de zinco com colunas para a construção de paredes transformando-o em um apartamento ou em uma churrasqueira. Um segundo tanque com instalações sanitárias para a lavanderia ou um segundo banheiro. É muito brilhante e sua condição é muito bom. portanto, opções consulte ouvir!'),
(2235, '2017-03-23 02:42:30', '2017-03-23 03:05:18', 'S', 256, 3, 'Argentina', 'Buenos Aires', 'Monte Grande', 'Centro', 'Sureste', 'Frente', '-34.82163', '-58.47845', 'S', '98000.00', 6, 'N', '0.00', 0, '0.00', '0.00', 0, 0, 0, 0, 'Monte Grande, Rojas 809', '', 'Monte Grande, Rojas 809', '', 'Monte Grande, Rojas 809', ''),
(2236, '2017-03-23 02:42:35', '2017-03-23 03:05:24', 'S', 250, 11, 'Argentina', 'Buenos Aires', 'Monte Grande', 'Centro', 'Noreste', 'Frente', '-34.81417', '-58.48414', 'S', '40000.00', 6, 'N', '0.00', 0, '0.00', '270.00', 0, 0, 0, 0, 'Monte Grande, Castro Chaves  S/n', '', 'Monte Grande, Castro Chaves  S/n', '', 'Monte Grande, Castro Chaves  S/n', '');

-- --------------------------------------------------------

--
-- Table structure for table `slides`
--

DROP TABLE IF EXISTS `slides`;
CREATE TABLE IF NOT EXISTS `slides` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE latin1_bin NOT NULL,
  `sys_status` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 COLLATE=latin1_bin AUTO_INCREMENT=125 ;

--
-- Dumping data for table `slides`
--

INSERT INTO `slides` (`id`, `title`, `sys_status`) VALUES
(1, 'Waltz, bad nymph, for quick jigs vex! Fox nymphs grab quick-jived waltz. Brick quiz whangs jumpy veldt fox. Bright vixens jump; dozy fowl quack.', 1),
(2, 'The quick, brown fox jumps over a lazy dog. DJs flock by when MTV ax quiz prog. Junk MTV quiz graced by fox whelps. Bawds jog, flick quartz, vex nymphs.', 1),
(3, 'Flummoxed by job, kvetching W. zaps Iraq. Cozy sphinx waves quart jug of bad milk. A very bad quack might jinx zippy fowls. Few quips galvanized the mock jury box.', 1),
(4, 'Quick wafting zephyrs vex bold Jim. Quick zephyrs blow, vexing daft Jim. Sex-charged fop blew my junk TV quiz. How quickly daft jumping zebras vex.', 1),
(5, 'Flummoxed by job, kvetching W. zaps Iraq. Cozy sphinx waves quart jug of bad milk. A very bad quack might jinx zippy fowls. Few quips galvanized the mock jury box.', 1),
(6, 'Waltz, bad nymph, for quick jigs vex! Fox nymphs grab quick-jived waltz. Brick quiz whangs jumpy veldt fox. Bright vixens jump; dozy fowl quack.', 1),
(7, 'Waltz, bad nymph, for quick jigs vex! Fox nymphs grab quick-jived waltz. Brick quiz whangs jumpy veldt fox. Bright vixens jump; dozy fowl quack.', 1),
(8, 'Waltz, bad nymph, for quick jigs vex! Fox nymphs grab quick-jived waltz. Brick quiz whangs jumpy veldt fox. Bright vixens jump; dozy fowl quack.', 1),
(9, 'Waltz, bad nymph, for quick jigs vex! Fox nymphs grab quick-jived waltz. Brick quiz whangs jumpy veldt fox. Bright vixens jump; dozy fowl quack.', 1),
(10, 'Waltz, bad nymph, for quick jigs vex! Fox nymphs grab quick-jived waltz. Brick quiz whangs jumpy veldt fox. Bright vixens jump; dozy fowl quack.', 1),
(11, 'Waltz, bad nymph, for quick jigs vex! Fox nymphs grab quick-jived waltz. Brick quiz whangs jumpy veldt fox. Bright vixens jump; dozy fowl quack.', 1),
(12, 'Waltz, bad nymph, for quick jigs vex! Fox nymphs grab quick-jived waltz. Brick quiz whangs jumpy veldt fox. Bright vixens jump; dozy fowl quack.', 1),
(13, 'Waltz, bad nymph, for quick jigs vex! Fox nymphs grab quick-jived waltz. Brick quiz whangs jumpy veldt fox. Bright vixens jump; dozy fowl quack.', 1),
(14, 'Waltz, bad nymph, for quick jigs vex! Fox nymphs grab quick-jived waltz. Brick quiz whangs jumpy veldt fox. Bright vixens jump; dozy fowl quack.', 1),
(15, 'Waltz, bad nymph, for quick jigs vex! Fox nymphs grab quick-jived waltz. Brick quiz whangs jumpy veldt fox. Bright vixens jump; dozy fowl quack.', 1),
(16, 'Waltz, bad nymph, for quick jigs vex! Fox nymphs grab quick-jived waltz. Brick quiz whangs jumpy veldt fox. Bright vixens jump; dozy fowl quack.', 1),
(17, 'Waltz, bad nymph, for quick jigs vex! Fox nymphs grab quick-jived waltz. Brick quiz whangs jumpy veldt fox. Bright vixens jump; dozy fowl quack.', 1),
(18, 'Waltz, bad nymph, for quick jigs vex! Fox nymphs grab quick-jived waltz. Brick quiz whangs jumpy veldt fox. Bright vixens jump; dozy fowl quack.', 1),
(19, 'Waltz, bad nymph, for quick jigs vex! Fox nymphs grab quick-jived waltz. Brick quiz whangs jumpy veldt fox. Bright vixens jump; dozy fowl quack.', 1),
(20, 'Waltz, bad nymph, for quick jigs vex! Fox nymphs grab quick-jived waltz. Brick quiz whangs jumpy veldt fox. Bright vixens jump; dozy fowl quack.', 1),
(21, 'Waltz, bad nymph, for quick jigs vex! Fox nymphs grab quick-jived waltz. Brick quiz whangs jumpy veldt fox. Bright vixens jump; dozy fowl quack.', 1),
(22, 'Waltz, bad nymph, for quick jigs vex! Fox nymphs grab quick-jived waltz. Brick quiz whangs jumpy veldt fox. Bright vixens jump; dozy fowl quack.', 1),
(23, 'Waltz, bad nymph, for quick jigs vex! Fox nymphs grab quick-jived waltz. Brick quiz whangs jumpy veldt fox. Bright vixens jump; dozy fowl quack.', 1),
(24, 'Waltz, bad nymph, for quick jigs vex! Fox nymphs grab quick-jived waltz. Brick quiz whangs jumpy veldt fox. Bright vixens jump; dozy fowl quack.', 1),
(25, 'Waltz, bad nymph, for quick jigs vex! Fox nymphs grab quick-jived waltz. Brick quiz whangs jumpy veldt fox. Bright vixens jump; dozy fowl quack.', 1),
(26, 'Waltz, bad nymph, for quick jigs vex! Fox nymphs grab quick-jived waltz. Brick quiz whangs jumpy veldt fox. Bright vixens jump; dozy fowl quack.', 1),
(27, 'Waltz, bad nymph, for quick jigs vex! Fox nymphs grab quick-jived waltz. Brick quiz whangs jumpy veldt fox. Bright vixens jump; dozy fowl quack.', 1),
(28, 'Waltz, bad nymph, for quick jigs vex! Fox nymphs grab quick-jived waltz. Brick quiz whangs jumpy veldt fox. Bright vixens jump; dozy fowl quack.', 1),
(29, 'Waltz, bad nymph, for quick jigs vex! Fox nymphs grab quick-jived waltz. Brick quiz whangs jumpy veldt fox. Bright vixens jump; dozy fowl quack.', 1),
(30, 'Waltz, bad nymph, for quick jigs vex! Fox nymphs grab quick-jived waltz. Brick quiz whangs jumpy veldt fox. Bright vixens jump; dozy fowl quack.', 1),
(31, 'Waltz, bad nymph, for quick jigs vex! Fox nymphs grab quick-jived waltz. Brick quiz whangs jumpy veldt fox. Bright vixens jump; dozy fowl quack.', 1),
(32, 'Waltz, bad nymph, for quick jigs vex! Fox nymphs grab quick-jived waltz. Brick quiz whangs jumpy veldt fox. Bright vixens jump; dozy fowl quack.', 1),
(33, 'Waltz, bad nymph, for quick jigs vex! Fox nymphs grab quick-jived waltz. Brick quiz whangs jumpy veldt fox. Bright vixens jump; dozy fowl quack.', 1),
(34, 'Waltz, bad nymph, for quick jigs vex! Fox nymphs grab quick-jived waltz. Brick quiz whangs jumpy veldt fox. Bright vixens jump; dozy fowl quack.', 1),
(35, 'Waltz, bad nymph, for quick jigs vex! Fox nymphs grab quick-jived waltz. Brick quiz whangs jumpy veldt fox. Bright vixens jump; dozy fowl quack.', 1),
(36, 'Waltz, bad nymph, for quick jigs vex! Fox nymphs grab quick-jived waltz. Brick quiz whangs jumpy veldt fox. Bright vixens jump; dozy fowl quack.', 1),
(37, 'Waltz, bad nymph, for quick jigs vex! Fox nymphs grab quick-jived waltz. Brick quiz whangs jumpy veldt fox. Bright vixens jump; dozy fowl quack.', 1),
(38, 'The quick, brown fox jumps over a lazy dog. DJs flock by when MTV ax quiz prog. Junk MTV quiz graced by fox whelps. Bawds jog, flick quartz, vex nymphs.', 1),
(39, 'The quick, brown fox jumps over a lazy dog. DJs flock by when MTV ax quiz prog. Junk MTV quiz graced by fox whelps. Bawds jog, flick quartz, vex nymphs.', 1),
(40, 'The quick, brown fox jumps over a lazy dog. DJs flock by when MTV ax quiz prog. Junk MTV quiz graced by fox whelps. Bawds jog, flick quartz, vex nymphs.', 1),
(41, 'The quick, brown fox jumps over a lazy dog. DJs flock by when MTV ax quiz prog. Junk MTV quiz graced by fox whelps. Bawds jog, flick quartz, vex nymphs.', 1),
(42, 'The quick, brown fox jumps over a lazy dog. DJs flock by when MTV ax quiz prog. Junk MTV quiz graced by fox whelps. Bawds jog, flick quartz, vex nymphs.', 1),
(43, 'The quick, brown fox jumps over a lazy dog. DJs flock by when MTV ax quiz prog. Junk MTV quiz graced by fox whelps. Bawds jog, flick quartz, vex nymphs.', 1),
(44, 'The quick, brown fox jumps over a lazy dog. DJs flock by when MTV ax quiz prog. Junk MTV quiz graced by fox whelps. Bawds jog, flick quartz, vex nymphs.', 1),
(45, 'The quick, brown fox jumps over a lazy dog. DJs flock by when MTV ax quiz prog. Junk MTV quiz graced by fox whelps. Bawds jog, flick quartz, vex nymphs.', 1),
(46, 'The quick, brown fox jumps over a lazy dog. DJs flock by when MTV ax quiz prog. Junk MTV quiz graced by fox whelps. Bawds jog, flick quartz, vex nymphs.', 1),
(47, 'The quick, brown fox jumps over a lazy dog. DJs flock by when MTV ax quiz prog. Junk MTV quiz graced by fox whelps. Bawds jog, flick quartz, vex nymphs.', 1),
(48, 'The quick, brown fox jumps over a lazy dog. DJs flock by when MTV ax quiz prog. Junk MTV quiz graced by fox whelps. Bawds jog, flick quartz, vex nymphs.', 1),
(49, 'The quick, brown fox jumps over a lazy dog. DJs flock by when MTV ax quiz prog. Junk MTV quiz graced by fox whelps. Bawds jog, flick quartz, vex nymphs.', 1),
(50, 'The quick, brown fox jumps over a lazy dog. DJs flock by when MTV ax quiz prog. Junk MTV quiz graced by fox whelps. Bawds jog, flick quartz, vex nymphs.', 1),
(51, 'The quick, brown fox jumps over a lazy dog. DJs flock by when MTV ax quiz prog. Junk MTV quiz graced by fox whelps. Bawds jog, flick quartz, vex nymphs.', 1),
(52, 'The quick, brown fox jumps over a lazy dog. DJs flock by when MTV ax quiz prog. Junk MTV quiz graced by fox whelps. Bawds jog, flick quartz, vex nymphs.', 1),
(53, 'The quick, brown fox jumps over a lazy dog. DJs flock by when MTV ax quiz prog. Junk MTV quiz graced by fox whelps. Bawds jog, flick quartz, vex nymphs.', 1),
(54, 'The quick, brown fox jumps over a lazy dog. DJs flock by when MTV ax quiz prog. Junk MTV quiz graced by fox whelps. Bawds jog, flick quartz, vex nymphs.', 1),
(55, 'The quick, brown fox jumps over a lazy dog. DJs flock by when MTV ax quiz prog. Junk MTV quiz graced by fox whelps. Bawds jog, flick quartz, vex nymphs.', 1),
(56, 'The quick, brown fox jumps over a lazy dog. DJs flock by when MTV ax quiz prog. Junk MTV quiz graced by fox whelps. Bawds jog, flick quartz, vex nymphs.', 1),
(57, 'The quick, brown fox jumps over a lazy dog. DJs flock by when MTV ax quiz prog. Junk MTV quiz graced by fox whelps. Bawds jog, flick quartz, vex nymphs.', 1),
(58, 'The quick, brown fox jumps over a lazy dog. DJs flock by when MTV ax quiz prog. Junk MTV quiz graced by fox whelps. Bawds jog, flick quartz, vex nymphs.', 1),
(59, 'The quick, brown fox jumps over a lazy dog. DJs flock by when MTV ax quiz prog. Junk MTV quiz graced by fox whelps. Bawds jog, flick quartz, vex nymphs.', 1),
(60, 'The quick, brown fox jumps over a lazy dog. DJs flock by when MTV ax quiz prog. Junk MTV quiz graced by fox whelps. Bawds jog, flick quartz, vex nymphs.', 1),
(61, 'The quick, brown fox jumps over a lazy dog. DJs flock by when MTV ax quiz prog. Junk MTV quiz graced by fox whelps. Bawds jog, flick quartz, vex nymphs.', 1),
(62, 'The quick, brown fox jumps over a lazy dog. DJs flock by when MTV ax quiz prog. Junk MTV quiz graced by fox whelps. Bawds jog, flick quartz, vex nymphs.', 1),
(63, 'The quick, brown fox jumps over a lazy dog. DJs flock by when MTV ax quiz prog. Junk MTV quiz graced by fox whelps. Bawds jog, flick quartz, vex nymphs.', 1),
(64, 'The quick, brown fox jumps over a lazy dog. DJs flock by when MTV ax quiz prog. Junk MTV quiz graced by fox whelps. Bawds jog, flick quartz, vex nymphs.', 1),
(65, 'The quick, brown fox jumps over a lazy dog. DJs flock by when MTV ax quiz prog. Junk MTV quiz graced by fox whelps. Bawds jog, flick quartz, vex nymphs.', 1),
(66, 'The quick, brown fox jumps over a lazy dog. DJs flock by when MTV ax quiz prog. Junk MTV quiz graced by fox whelps. Bawds jog, flick quartz, vex nymphs.', 1),
(67, 'The quick, brown fox jumps over a lazy dog. DJs flock by when MTV ax quiz prog. Junk MTV quiz graced by fox whelps. Bawds jog, flick quartz, vex nymphs.', 1),
(68, 'The quick, brown fox jumps over a lazy dog. DJs flock by when MTV ax quiz prog. Junk MTV quiz graced by fox whelps. Bawds jog, flick quartz, vex nymphs.', 1),
(69, 'The quick, brown fox jumps over a lazy dog. DJs flock by when MTV ax quiz prog. Junk MTV quiz graced by fox whelps. Bawds jog, flick quartz, vex nymphs.', 1),
(70, 'The quick, brown fox jumps over a lazy dog. DJs flock by when MTV ax quiz prog. Junk MTV quiz graced by fox whelps. Bawds jog, flick quartz, vex nymphs.', 1),
(71, 'The quick, brown fox jumps over a lazy dog. DJs flock by when MTV ax quiz prog. Junk MTV quiz graced by fox whelps. Bawds jog, flick quartz, vex nymphs.', 1),
(72, 'The quick, brown fox jumps over a lazy dog. DJs flock by when MTV ax quiz prog. Junk MTV quiz graced by fox whelps. Bawds jog, flick quartz, vex nymphs.', 1),
(73, 'The quick, brown fox jumps over a lazy dog. DJs flock by when MTV ax quiz prog. Junk MTV quiz graced by fox whelps. Bawds jog, flick quartz, vex nymphs.', 1),
(74, 'The quick, brown fox jumps over a lazy dog. DJs flock by when MTV ax quiz prog. Junk MTV quiz graced by fox whelps. Bawds jog, flick quartz, vex nymphs.', 1),
(75, 'The quick, brown fox jumps over a lazy dog. DJs flock by when MTV ax quiz prog. Junk MTV quiz graced by fox whelps. Bawds jog, flick quartz, vex nymphs.', 1),
(76, 'The quick, brown fox jumps over a lazy dog. DJs flock by when MTV ax quiz prog. Junk MTV quiz graced by fox whelps. Bawds jog, flick quartz, vex nymphs.', 1),
(77, 'The quick, brown fox jumps over a lazy dog. DJs flock by when MTV ax quiz prog. Junk MTV quiz graced by fox whelps. Bawds jog, flick quartz, vex nymphs.', 1),
(78, 'The quick, brown fox jumps over a lazy dog. DJs flock by when MTV ax quiz prog. Junk MTV quiz graced by fox whelps. Bawds jog, flick quartz, vex nymphs.', 1),
(79, 'The quick, brown fox jumps over a lazy dog. DJs flock by when MTV ax quiz prog. Junk MTV quiz graced by fox whelps. Bawds jog, flick quartz, vex nymphs.', 1),
(80, 'The quick, brown fox jumps over a lazy dog. DJs flock by when MTV ax quiz prog. Junk MTV quiz graced by fox whelps. Bawds jog, flick quartz, vex nymphs.', 1),
(81, 'The quick, brown fox jumps over a lazy dog. DJs flock by when MTV ax quiz prog. Junk MTV quiz graced by fox whelps. Bawds jog, flick quartz, vex nymphs.', 1),
(82, 'The quick, brown fox jumps over a lazy dog. DJs flock by when MTV ax quiz prog. Junk MTV quiz graced by fox whelps. Bawds jog, flick quartz, vex nymphs.', 1),
(83, 'The quick, brown fox jumps over a lazy dog. DJs flock by when MTV ax quiz prog. Junk MTV quiz graced by fox whelps. Bawds jog, flick quartz, vex nymphs.', 1),
(84, 'The quick, brown fox jumps over a lazy dog. DJs flock by when MTV ax quiz prog. Junk MTV quiz graced by fox whelps. Bawds jog, flick quartz, vex nymphs.', 1),
(85, 'The quick, brown fox jumps over a lazy dog. DJs flock by when MTV ax quiz prog. Junk MTV quiz graced by fox whelps. Bawds jog, flick quartz, vex nymphs.', 1),
(86, 'The quick, brown fox jumps over a lazy dog. DJs flock by when MTV ax quiz prog. Junk MTV quiz graced by fox whelps. Bawds jog, flick quartz, vex nymphs.', 1),
(87, 'The quick, brown fox jumps over a lazy dog. DJs flock by when MTV ax quiz prog. Junk MTV quiz graced by fox whelps. Bawds jog, flick quartz, vex nymphs.', 1),
(88, 'The quick, brown fox jumps over a lazy dog. DJs flock by when MTV ax quiz prog. Junk MTV quiz graced by fox whelps. Bawds jog, flick quartz, vex nymphs.', 1),
(89, 'The quick, brown fox jumps over a lazy dog. DJs flock by when MTV ax quiz prog. Junk MTV quiz graced by fox whelps. Bawds jog, flick quartz, vex nymphs.', 1),
(90, 'The quick, brown fox jumps over a lazy dog. DJs flock by when MTV ax quiz prog. Junk MTV quiz graced by fox whelps. Bawds jog, flick quartz, vex nymphs.', 1),
(91, 'The quick, brown fox jumps over a lazy dog. DJs flock by when MTV ax quiz prog. Junk MTV quiz graced by fox whelps. Bawds jog, flick quartz, vex nymphs.', 1),
(92, 'The quick, brown fox jumps over a lazy dog. DJs flock by when MTV ax quiz prog. Junk MTV quiz graced by fox whelps. Bawds jog, flick quartz, vex nymphs.', 1),
(93, 'The quick, brown fox jumps over a lazy dog. DJs flock by when MTV ax quiz prog. Junk MTV quiz graced by fox whelps. Bawds jog, flick quartz, vex nymphs.', 1),
(94, 'The quick, brown fox jumps over a lazy dog. DJs flock by when MTV ax quiz prog. Junk MTV quiz graced by fox whelps. Bawds jog, flick quartz, vex nymphs.', 1),
(95, 'The quick, brown fox jumps over a lazy dog. DJs flock by when MTV ax quiz prog. Junk MTV quiz graced by fox whelps. Bawds jog, flick quartz, vex nymphs.', 1),
(96, 'The quick, brown fox jumps over a lazy dog. DJs flock by when MTV ax quiz prog. Junk MTV quiz graced by fox whelps. Bawds jog, flick quartz, vex nymphs.', 1),
(97, 'The quick, brown fox jumps over a lazy dog. DJs flock by when MTV ax quiz prog. Junk MTV quiz graced by fox whelps. Bawds jog, flick quartz, vex nymphs.', 1),
(98, 'The quick, brown fox jumps over a lazy dog. DJs flock by when MTV ax quiz prog. Junk MTV quiz graced by fox whelps. Bawds jog, flick quartz, vex nymphs.', 1),
(99, 'The quick, brown fox jumps over a lazy dog. DJs flock by when MTV ax quiz prog. Junk MTV quiz graced by fox whelps. Bawds jog, flick quartz, vex nymphs.', 1),
(100, 'The quick, brown fox jumps over a lazy dog. DJs flock by when MTV ax quiz prog. Junk MTV quiz graced by fox whelps. Bawds jog, flick quartz, vex nymphs.', 1),
(101, 'The quick, brown fox jumps over a lazy dog. DJs flock by when MTV ax quiz prog. Junk MTV quiz graced by fox whelps. Bawds jog, flick quartz, vex nymphs.', 1),
(102, 'The quick, brown fox jumps over a lazy dog. DJs flock by when MTV ax quiz prog. Junk MTV quiz graced by fox whelps. Bawds jog, flick quartz, vex nymphs.', 1),
(103, 'The quick, brown fox jumps over a lazy dog. DJs flock by when MTV ax quiz prog. Junk MTV quiz graced by fox whelps. Bawds jog, flick quartz, vex nymphs.', 1),
(104, 'The quick, brown fox jumps over a lazy dog. DJs flock by when MTV ax quiz prog. Junk MTV quiz graced by fox whelps. Bawds jog, flick quartz, vex nymphs.', 1),
(105, 'The quick, brown fox jumps over a lazy dog. DJs flock by when MTV ax quiz prog. Junk MTV quiz graced by fox whelps. Bawds jog, flick quartz, vex nymphs.', 1),
(106, 'The quick, brown fox jumps over a lazy dog. DJs flock by when MTV ax quiz prog. Junk MTV quiz graced by fox whelps. Bawds jog, flick quartz, vex nymphs.', 1),
(107, 'The quick, brown fox jumps over a lazy dog. DJs flock by when MTV ax quiz prog. Junk MTV quiz graced by fox whelps. Bawds jog, flick quartz, vex nymphs.', 1),
(108, 'The quick, brown fox jumps over a lazy dog. DJs flock by when MTV ax quiz prog. Junk MTV quiz graced by fox whelps. Bawds jog, flick quartz, vex nymphs.', 1),
(109, 'The quick, brown fox jumps over a lazy dog. DJs flock by when MTV ax quiz prog. Junk MTV quiz graced by fox whelps. Bawds jog, flick quartz, vex nymphs.', 1),
(110, 'The quick, brown fox jumps over a lazy dog. DJs flock by when MTV ax quiz prog. Junk MTV quiz graced by fox whelps. Bawds jog, flick quartz, vex nymphs.', 1),
(111, 'The quick, brown fox jumps over a lazy dog. DJs flock by when MTV ax quiz prog. Junk MTV quiz graced by fox whelps. Bawds jog, flick quartz, vex nymphs.', 1),
(112, 'The quick, brown fox jumps over a lazy dog. DJs flock by when MTV ax quiz prog. Junk MTV quiz graced by fox whelps. Bawds jog, flick quartz, vex nymphs.', 1),
(113, 'The quick, brown fox jumps over a lazy dog. DJs flock by when MTV ax quiz prog. Junk MTV quiz graced by fox whelps. Bawds jog, flick quartz, vex nymphs.', 1),
(114, 'The quick, brown fox jumps over a lazy dog. DJs flock by when MTV ax quiz prog. Junk MTV quiz graced by fox whelps. Bawds jog, flick quartz, vex nymphs.', 1),
(115, 'The quick, brown fox jumps over a lazy dog. DJs flock by when MTV ax quiz prog. Junk MTV quiz graced by fox whelps. Bawds jog, flick quartz, vex nymphs.', 1),
(116, 'The quick, brown fox jumps over a lazy dog. DJs flock by when MTV ax quiz prog. Junk MTV quiz graced by fox whelps. Bawds jog, flick quartz, vex nymphs.', 1),
(117, 'The quick, brown fox jumps over a lazy dog. DJs flock by when MTV ax quiz prog. Junk MTV quiz graced by fox whelps. Bawds jog, flick quartz, vex nymphs.', 1),
(118, 'The quick, brown fox jumps over a lazy dog. DJs flock by when MTV ax quiz prog. Junk MTV quiz graced by fox whelps. Bawds jog, flick quartz, vex nymphs.', 1),
(119, 'The quick, brown fox jumps over a lazy dog. DJs flock by when MTV ax quiz prog. Junk MTV quiz graced by fox whelps. Bawds jog, flick quartz, vex nymphs.', 1),
(120, 'The quick, brown fox jumps over a lazy dog. DJs flock by when MTV ax quiz prog. Junk MTV quiz graced by fox whelps. Bawds jog, flick quartz, vex nymphs.', 1),
(121, 'The quick, brown fox jumps over a lazy dog. DJs flock by when MTV ax quiz prog. Junk MTV quiz graced by fox whelps. Bawds jog, flick quartz, vex nymphs.', 1),
(122, 'The quick, brown fox jumps over a lazy dog. DJs flock by when MTV ax quiz prog. Junk MTV quiz graced by fox whelps. Bawds jog, flick quartz, vex nymphs.', 1),
(123, 'The quick, brown fox jumps over a lazy dog. DJs flock by when MTV ax quiz prog. Junk MTV quiz graced by fox whelps. Bawds jog, flick quartz, vex nymphs.', 1),
(124, 'The quick, brown fox jumps over a lazy dog. DJs flock by when MTV ax quiz prog. Junk MTV quiz graced by fox whelps. Bawds jog, flick quartz, vex nymphs.', 1);

-- --------------------------------------------------------

--
-- Table structure for table `sys_attach`
--

DROP TABLE IF EXISTS `sys_attach`;
CREATE TABLE IF NOT EXISTS `sys_attach` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ref_id` varchar(255) COLLATE latin1_bin NOT NULL,
  `ref_table` varchar(255) COLLATE latin1_bin NOT NULL,
  `ref_attach_id` int(11) NOT NULL,
  `file` text COLLATE latin1_bin NOT NULL,
  `activo` text COLLATE latin1_bin NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 COLLATE=latin1_bin AUTO_INCREMENT=658 ;

--
-- Dumping data for table `sys_attach`
--

INSERT INTO `sys_attach` (`id`, `ref_id`, `ref_table`, `ref_attach_id`, `file`, `activo`) VALUES
(1, '2166', 'propiedades', 1, '497.jpg', 'S'),
(2, '2166', 'propiedades', 1, '498.jpg', 'S'),
(3, '2166', 'propiedades', 1, '500.jpg', 'S'),
(4, '2166', 'propiedades', 1, '501.jpg', 'S'),
(5, '2166', 'propiedades', 1, '502.jpg', 'S'),
(6, '2166', 'propiedades', 1, '504.jpg', 'S'),
(7, '2170', 'propiedades', 1, '403.jpg', 'S'),
(8, '2170', 'propiedades', 1, '404.jpg', 'S'),
(9, '2170', 'propiedades', 1, '405.jpg', 'S'),
(10, '2170', 'propiedades', 1, '422.jpg', 'S'),
(11, '2170', 'propiedades', 1, '423.jpg', 'S'),
(12, '2171', 'propiedades', 1, '505.jpg', 'S'),
(13, '2171', 'propiedades', 1, '506.jpg', 'S'),
(14, '2171', 'propiedades', 1, '507.jpg', 'S'),
(15, '2171', 'propiedades', 1, '508.jpg', 'S'),
(16, '2171', 'propiedades', 1, '509.jpg', 'S'),
(17, '2098', 'propiedades', 1, '655.jpg', 'S'),
(18, '2098', 'propiedades', 1, '656.jpg', 'S'),
(19, '2098', 'propiedades', 1, '657.jpg', 'S'),
(20, '2098', 'propiedades', 1, '658.jpg', 'S'),
(21, '2098', 'propiedades', 1, '659.jpg', 'S'),
(22, '2098', 'propiedades', 1, '660.jpg', 'S'),
(23, '2173', 'propiedades', 1, '661.jpg', 'S'),
(24, '2173', 'propiedades', 1, '662.jpg', 'S'),
(25, '2173', 'propiedades', 1, '663.jpg', 'S'),
(26, '2173', 'propiedades', 1, '664.jpg', 'S'),
(27, '2173', 'propiedades', 1, '665.jpg', 'S'),
(28, '2173', 'propiedades', 1, '666.jpg', 'S'),
(29, '2173', 'propiedades', 1, '667.jpg', 'S'),
(30, '2174', 'propiedades', 1, '668.jpg', 'S'),
(31, '2174', 'propiedades', 1, '669.jpg', 'S'),
(32, '2174', 'propiedades', 1, '670.jpg', 'S'),
(33, '2174', 'propiedades', 1, '671.jpg', 'S'),
(34, '2174', 'propiedades', 1, '672.jpg', 'S'),
(35, '2174', 'propiedades', 1, '673.jpg', 'S'),
(36, '2174', 'propiedades', 1, '674.jpg', 'S'),
(37, '2175', 'propiedades', 1, '675.jpg', 'S'),
(38, '2175', 'propiedades', 1, '677.jpg', 'S'),
(39, '2175', 'propiedades', 1, '678.jpg', 'S'),
(40, '2175', 'propiedades', 1, '679.jpg', 'S'),
(41, '2175', 'propiedades', 1, '680.jpg', 'S'),
(42, '2175', 'propiedades', 1, '681.jpg', 'S'),
(43, '2175', 'propiedades', 1, '682.jpg', 'S'),
(44, '2176', 'propiedades', 1, '687.jpg', 'S'),
(45, '2176', 'propiedades', 1, '688.jpg', 'S'),
(46, '2176', 'propiedades', 1, '689.jpg', 'S'),
(47, '2176', 'propiedades', 1, '690.jpg', 'S'),
(48, '2176', 'propiedades', 1, '691.jpg', 'S'),
(49, '2176', 'propiedades', 1, '692.jpg', 'S'),
(50, '2176', 'propiedades', 1, '693.jpg', 'S'),
(51, '2177', 'propiedades', 1, '740.jpg', 'S'),
(52, '2177', 'propiedades', 1, '741.jpg', 'S'),
(53, '2177', 'propiedades', 1, '742.jpg', 'S'),
(54, '2177', 'propiedades', 1, '743.jpg', 'S'),
(55, '2177', 'propiedades', 1, '744.jpg', 'S'),
(56, '2177', 'propiedades', 1, '745.jpg', 'S'),
(57, '2177', 'propiedades', 1, '746.jpg', 'S'),
(58, '2177', 'propiedades', 1, '747.jpg', 'S'),
(59, '2177', 'propiedades', 1, '748.jpg', 'S'),
(60, '2177', 'propiedades', 1, '749.jpg', 'S'),
(61, '2177', 'propiedades', 1, '750.jpg', 'S'),
(62, '2178', 'propiedades', 1, '751.jpg', 'S'),
(63, '2178', 'propiedades', 1, '752.jpg', 'S'),
(64, '2178', 'propiedades', 1, '753.jpg', 'S'),
(65, '2178', 'propiedades', 1, '754.jpg', 'S'),
(66, '2178', 'propiedades', 1, '755.jpg', 'S'),
(67, '2178', 'propiedades', 1, '756.jpg', 'S'),
(68, '2178', 'propiedades', 1, '758.jpg', 'S'),
(69, '2178', 'propiedades', 1, '759.jpg', 'S'),
(70, '2178', 'propiedades', 1, '760.jpg', 'S'),
(71, '2178', 'propiedades', 1, '761.jpg', 'S'),
(72, '2178', 'propiedades', 1, '762.jpg', 'S'),
(73, '2178', 'propiedades', 1, '763.jpg', 'S'),
(74, '2178', 'propiedades', 1, '764.jpg', 'S'),
(75, '2178', 'propiedades', 1, '765.jpg', 'S'),
(76, '2178', 'propiedades', 1, '766.jpg', 'S'),
(77, '2179', 'propiedades', 1, '1065.jpg', 'S'),
(78, '2179', 'propiedades', 1, '1072.jpg', 'S'),
(79, '2179', 'propiedades', 1, '1074.jpg', 'S'),
(80, '2179', 'propiedades', 1, '1075.jpg', 'S'),
(81, '2179', 'propiedades', 1, '1103.jpg', 'S'),
(82, '2180', 'propiedades', 1, '1076.jpg', 'S'),
(83, '2180', 'propiedades', 1, '1077.jpg', 'S'),
(84, '2180', 'propiedades', 1, '1078.jpg', 'S'),
(85, '2180', 'propiedades', 1, '1079.jpg', 'S'),
(86, '2180', 'propiedades', 1, '1081.jpg', 'S'),
(87, '2181', 'propiedades', 1, '1106.jpg', 'S'),
(88, '2181', 'propiedades', 1, '1107.jpg', 'S'),
(89, '2181', 'propiedades', 1, '1110.jpg', 'S'),
(90, '2181', 'propiedades', 1, '1119.jpg', 'S'),
(91, '2181', 'propiedades', 1, '1120.jpg', 'S'),
(92, '2181', 'propiedades', 1, '1121.jpg', 'S'),
(93, '2182', 'propiedades', 1, '1124.jpg', 'S'),
(94, '2182', 'propiedades', 1, '1125.jpg', 'S'),
(95, '2182', 'propiedades', 1, '1126.jpg', 'S'),
(96, '2182', 'propiedades', 1, '1128.jpg', 'S'),
(97, '2182', 'propiedades', 1, '1137.jpg', 'S'),
(98, '2182', 'propiedades', 1, '1138.jpg', 'S'),
(99, '2183', 'propiedades', 1, '1146.jpg', 'S'),
(100, '2183', 'propiedades', 1, '1148.jpg', 'S'),
(101, '2183', 'propiedades', 1, '1149.jpg', 'S'),
(102, '2183', 'propiedades', 1, '1150.jpg', 'S'),
(103, '2185', 'propiedades', 1, '1163.jpg', 'S'),
(104, '2185', 'propiedades', 1, '1164.jpg', 'S'),
(105, '2185', 'propiedades', 1, '1165.jpg', 'S'),
(106, '2185', 'propiedades', 1, '1166.jpg', 'S'),
(107, '2185', 'propiedades', 1, '1168.jpg', 'S'),
(108, '2186', 'propiedades', 1, '1177.jpg', 'S'),
(109, '2186', 'propiedades', 1, '1178.jpg', 'S'),
(110, '2186', 'propiedades', 1, '1179.jpg', 'S'),
(111, '2186', 'propiedades', 1, '1180.jpg', 'S'),
(112, '2186', 'propiedades', 1, '1182.jpg', 'S'),
(113, '2186', 'propiedades', 1, '1191.jpg', 'S'),
(114, '2188', 'propiedades', 1, '1204.jpg', 'S'),
(115, '2188', 'propiedades', 1, '1205.jpg', 'S'),
(116, '2188', 'propiedades', 1, '1206.jpg', 'S'),
(117, '2188', 'propiedades', 1, '1208.jpg', 'S'),
(118, '2188', 'propiedades', 1, '1216.jpg', 'S'),
(119, '2188', 'propiedades', 1, '1217.jpg', 'S'),
(120, '2189', 'propiedades', 1, '1224.jpg', 'S'),
(121, '2189', 'propiedades', 1, '1226.jpg', 'S'),
(122, '2189', 'propiedades', 1, '1227.jpg', 'S'),
(123, '2189', 'propiedades', 1, '1228.jpg', 'S'),
(124, '2194', 'propiedades', 1, '253.jpg', 'S'),
(125, '2194', 'propiedades', 1, '254.JPG', 'S'),
(126, '2194', 'propiedades', 1, '257.JPG', 'S'),
(127, '2194', 'propiedades', 1, '258.JPG', 'S'),
(128, '2194', 'propiedades', 1, '261.JPG', 'S'),
(129, '2194', 'propiedades', 1, '262.JPG', 'S'),
(130, '2194', 'propiedades', 1, '269.JPG', 'S'),
(131, '2194', 'propiedades', 1, '272.JPG', 'S'),
(132, '2194', 'propiedades', 1, '274.JPG', 'S'),
(133, '2194', 'propiedades', 1, '278.JPG', 'S'),
(134, '2194', 'propiedades', 1, '279.JPG', 'S'),
(135, '2194', 'propiedades', 1, '281.JPG', 'S'),
(136, '2233', 'propiedades', 1, '900.jpg', 'S'),
(137, '2233', 'propiedades', 1, '901.jpg', 'S'),
(138, '2233', 'propiedades', 1, '902.jpg', 'S'),
(139, '2233', 'propiedades', 1, '904.jpg', 'S'),
(140, '2233', 'propiedades', 1, '905.jpg', 'S'),
(141, '2233', 'propiedades', 1, '907.jpg', 'S'),
(142, '2233', 'propiedades', 1, '908.jpg', 'S'),
(143, '2233', 'propiedades', 1, '909.jpg', 'S'),
(144, '2233', 'propiedades', 1, '910.jpg', 'S'),
(145, '2233', 'propiedades', 1, '911.jpg', 'S'),
(146, '2233', 'propiedades', 1, '912.jpg', 'S'),
(147, '2233', 'propiedades', 1, '913.jpg', 'S'),
(148, '2233', 'propiedades', 1, '914.jpg', 'S'),
(149, '2233', 'propiedades', 1, '915.jpg', 'S'),
(150, '2233', 'propiedades', 1, '916.jpg', 'S'),
(151, '2233', 'propiedades', 1, '917.jpg', 'S'),
(152, '2233', 'propiedades', 1, '918.jpg', 'S'),
(153, '2233', 'propiedades', 1, '919.jpg', 'S'),
(154, '2233', 'propiedades', 1, '921.jpg', 'S'),
(155, '2233', 'propiedades', 1, '922.jpg', 'S'),
(156, '2233', 'propiedades', 1, '923.jpg', 'S'),
(157, '2233', 'propiedades', 1, '924.jpg', 'S'),
(158, '2233', 'propiedades', 1, '925.jpg', 'S'),
(159, '2233', 'propiedades', 1, '926.jpg', 'S'),
(160, '2233', 'propiedades', 1, '927.jpg', 'S'),
(161, '2233', 'propiedades', 1, '928.jpg', 'S'),
(162, '2233', 'propiedades', 1, '929.jpg', 'S'),
(163, '2233', 'propiedades', 1, '932.jpg', 'S'),
(164, '2233', 'propiedades', 1, '933.jpg', 'S'),
(165, '2119', 'propiedades', 1, '634.jpg', 'S'),
(166, '2119', 'propiedades', 1, '1790.jpg', 'S'),
(167, '2195', 'propiedades', 1, '704.jpg', 'S'),
(168, '2195', 'propiedades', 1, '705.jpg', 'S'),
(169, '2195', 'propiedades', 1, '706.jpg', 'S'),
(170, '2196', 'propiedades', 1, '707.jpg', 'S'),
(171, '2196', 'propiedades', 1, '708.jpg', 'S'),
(172, '2196', 'propiedades', 1, '709.jpg', 'S'),
(173, '2197', 'propiedades', 1, '934.JPG', 'S'),
(174, '2197', 'propiedades', 1, '935.JPG', 'S'),
(175, '2197', 'propiedades', 1, '936.JPG', 'S'),
(176, '2197', 'propiedades', 1, '937.JPG', 'S'),
(177, '2197', 'propiedades', 1, '938.JPG', 'S'),
(178, '2197', 'propiedades', 1, '939.JPG', 'S'),
(179, '2197', 'propiedades', 1, '940.JPG', 'S'),
(180, '2197', 'propiedades', 1, '941.JPG', 'S'),
(181, '2197', 'propiedades', 1, '942.JPG', 'S'),
(182, '2197', 'propiedades', 1, '943.JPG', 'S'),
(183, '2198', 'propiedades', 1, '860.jpg', 'S'),
(184, '2198', 'propiedades', 1, '861.jpg', 'S'),
(185, '2198', 'propiedades', 1, '862.jpg', 'S'),
(186, '2198', 'propiedades', 1, '863.jpg', 'S'),
(187, '2198', 'propiedades', 1, '864.jpg', 'S'),
(188, '2198', 'propiedades', 1, '865.jpg', 'S'),
(189, '2198', 'propiedades', 1, '866.jpg', 'S'),
(190, '2198', 'propiedades', 1, '867.jpg', 'S'),
(191, '2198', 'propiedades', 1, '868.jpg', 'S'),
(192, '2198', 'propiedades', 1, '869.jpg', 'S'),
(193, '2198', 'propiedades', 1, '870.jpg', 'S'),
(194, '2198', 'propiedades', 1, '871.jpg', 'S'),
(195, '2198', 'propiedades', 1, '872.jpg', 'S'),
(196, '2198', 'propiedades', 1, '873.jpg', 'S'),
(197, '2198', 'propiedades', 1, '874.jpg', 'S'),
(198, '2198', 'propiedades', 1, '876.jpg', 'S'),
(199, '2198', 'propiedades', 1, '877.jpg', 'S'),
(200, '2198', 'propiedades', 1, '878.jpg', 'S'),
(201, '2198', 'propiedades', 1, '879.jpg', 'S'),
(202, '2198', 'propiedades', 1, '880.jpg', 'S'),
(203, '2198', 'propiedades', 1, '881.jpg', 'S'),
(204, '2198', 'propiedades', 1, '882.jpg', 'S'),
(205, '2198', 'propiedades', 1, '883.jpg', 'S'),
(206, '2198', 'propiedades', 1, '884.jpg', 'S'),
(207, '2198', 'propiedades', 1, '885.jpg', 'S'),
(208, '2198', 'propiedades', 1, '887.jpg', 'S'),
(209, '2198', 'propiedades', 1, '888.jpg', 'S'),
(210, '2198', 'propiedades', 1, '889.jpg', 'S'),
(211, '2198', 'propiedades', 1, '890.jpg', 'S'),
(212, '2198', 'propiedades', 1, '891.jpg', 'S'),
(213, '2198', 'propiedades', 1, '892.jpg', 'S'),
(214, '2198', 'propiedades', 1, '893.jpg', 'S'),
(215, '2198', 'propiedades', 1, '895.jpg', 'S'),
(216, '2198', 'propiedades', 1, '896.jpg', 'S'),
(217, '2198', 'propiedades', 1, '897.jpg', 'S'),
(218, '2198', 'propiedades', 1, '899.jpg', 'S'),
(219, '2200', 'propiedades', 1, '1020.jpg', 'S'),
(220, '2200', 'propiedades', 1, '1021.jpg', 'S'),
(221, '2200', 'propiedades', 1, '1024.jpg', 'S'),
(222, '2200', 'propiedades', 1, '1029.jpg', 'S'),
(223, '2200', 'propiedades', 1, '1032.jpg', 'S'),
(224, '2200', 'propiedades', 1, '1034.jpg', 'S'),
(225, '2200', 'propiedades', 1, '1056.jpg', 'S'),
(226, '2200', 'propiedades', 1, '1057.jpg', 'S'),
(227, '2200', 'propiedades', 1, '1058.jpg', 'S'),
(228, '2200', 'propiedades', 1, '1059.jpg', 'S'),
(229, '2200', 'propiedades', 1, '1060.jpg', 'S'),
(230, '2200', 'propiedades', 1, '1061.jpg', 'S'),
(231, '2200', 'propiedades', 1, '1062.jpg', 'S'),
(232, '2200', 'propiedades', 1, '1063.jpg', 'S'),
(233, '2200', 'propiedades', 1, '1064.jpg', 'S'),
(234, '2203', 'propiedades', 1, '724.jpg', 'S'),
(235, '2203', 'propiedades', 1, '725.jpg', 'S'),
(236, '2203', 'propiedades', 1, '726.jpg', 'S'),
(237, '2203', 'propiedades', 1, '727.jpg', 'S'),
(238, '2203', 'propiedades', 1, '728.jpg', 'S'),
(239, '2203', 'propiedades', 1, '729.jpg', 'S'),
(240, '2203', 'propiedades', 1, '730.jpg', 'S'),
(241, '2203', 'propiedades', 1, '731.jpg', 'S'),
(242, '2204', 'propiedades', 1, '732.jpg', 'S'),
(243, '2204', 'propiedades', 1, '733.jpg', 'S'),
(244, '2204', 'propiedades', 1, '734.jpg', 'S'),
(245, '2204', 'propiedades', 1, '735.jpg', 'S'),
(246, '2204', 'propiedades', 1, '736.jpg', 'S'),
(247, '2204', 'propiedades', 1, '737.jpg', 'S'),
(248, '2204', 'propiedades', 1, '738.jpg', 'S'),
(249, '2204', 'propiedades', 1, '739.jpg', 'S'),
(250, '2128', 'propiedades', 1, '178.jpg', 'S'),
(251, '2128', 'propiedades', 1, '180.jpg', 'S'),
(252, '2128', 'propiedades', 1, '181.jpg', 'S'),
(253, '2128', 'propiedades', 1, '182.jpg', 'S'),
(254, '2128', 'propiedades', 1, '184.jpg', 'S'),
(255, '2128', 'propiedades', 1, '185.jpg', 'S'),
(256, '2128', 'propiedades', 1, '186.jpg', 'S'),
(257, '2128', 'propiedades', 1, '187.jpg', 'S'),
(258, '2128', 'propiedades', 1, '188.jpg', 'S'),
(259, '2128', 'propiedades', 1, '190.jpg', 'S'),
(260, '2206', 'propiedades', 1, '361.jpg', 'S'),
(261, '2206', 'propiedades', 1, '362.jpg', 'S'),
(262, '2206', 'propiedades', 1, '363.jpg', 'S'),
(263, '2206', 'propiedades', 1, '406.jpg', 'S'),
(264, '2206', 'propiedades', 1, '408.jpg', 'S'),
(265, '2207', 'propiedades', 1, '364.jpg', 'S'),
(266, '2207', 'propiedades', 1, '365.jpg', 'S'),
(267, '2207', 'propiedades', 1, '366.jpg', 'S'),
(268, '2207', 'propiedades', 1, '409.jpg', 'S'),
(269, '2207', 'propiedades', 1, '410.jpg', 'S'),
(270, '2207', 'propiedades', 1, '411.jpg', 'S'),
(271, '2208', 'propiedades', 1, '367.jpg', 'S'),
(272, '2208', 'propiedades', 1, '368.jpg', 'S'),
(273, '2208', 'propiedades', 1, '369.jpg', 'S'),
(274, '2208', 'propiedades', 1, '412.jpg', 'S'),
(275, '2208', 'propiedades', 1, '413.jpg', 'S'),
(276, '2209', 'propiedades', 1, '370.jpg', 'S'),
(277, '2209', 'propiedades', 1, '371.jpg', 'S'),
(278, '2209', 'propiedades', 1, '372.jpg', 'S'),
(279, '2209', 'propiedades', 1, '414.jpg', 'S'),
(280, '2209', 'propiedades', 1, '415.jpg', 'S'),
(281, '2210', 'propiedades', 1, '394.jpg', 'S'),
(282, '2210', 'propiedades', 1, '395.jpg', 'S'),
(283, '2210', 'propiedades', 1, '396.jpg', 'S'),
(284, '2210', 'propiedades', 1, '416.jpg', 'S'),
(285, '2210', 'propiedades', 1, '417.jpg', 'S'),
(286, '2211', 'propiedades', 1, '397.jpg', 'S'),
(287, '2211', 'propiedades', 1, '398.jpg', 'S'),
(288, '2211', 'propiedades', 1, '399.jpg', 'S'),
(289, '2211', 'propiedades', 1, '418.jpg', 'S'),
(290, '2211', 'propiedades', 1, '419.jpg', 'S'),
(291, '2212', 'propiedades', 1, '400.jpg', 'S'),
(292, '2212', 'propiedades', 1, '401.jpg', 'S'),
(293, '2212', 'propiedades', 1, '402.jpg', 'S'),
(294, '2212', 'propiedades', 1, '420.jpg', 'S'),
(295, '2212', 'propiedades', 1, '421.jpg', 'S'),
(296, '2213', 'propiedades', 1, '461.jpg', 'S'),
(297, '2213', 'propiedades', 1, '462.jpg', 'S'),
(298, '2213', 'propiedades', 1, '463.jpg', 'S'),
(299, '2213', 'propiedades', 1, '464.jpg', 'S'),
(300, '2213', 'propiedades', 1, '466.jpg', 'S'),
(301, '2213', 'propiedades', 1, '467.jpg', 'S'),
(302, '2213', 'propiedades', 1, '468.jpg', 'S'),
(303, '2213', 'propiedades', 1, '469.jpg', 'S'),
(304, '2213', 'propiedades', 1, '470.jpg', 'S'),
(305, '2213', 'propiedades', 1, '471.jpg', 'S'),
(306, '2214', 'propiedades', 1, '526.jpg', 'S'),
(307, '2214', 'propiedades', 1, '527.jpg', 'S'),
(308, '2214', 'propiedades', 1, '528.jpg', 'S'),
(309, '2214', 'propiedades', 1, '529.jpg', 'S'),
(310, '2214', 'propiedades', 1, '530.jpg', 'S'),
(311, '2214', 'propiedades', 1, '531.jpg', 'S'),
(312, '2214', 'propiedades', 1, '532.jpg', 'S'),
(313, '2214', 'propiedades', 1, '533.jpg', 'S'),
(314, '2214', 'propiedades', 1, '534.jpg', 'S'),
(315, '2214', 'propiedades', 1, '535.jpg', 'S'),
(316, '2214', 'propiedades', 1, '536.jpg', 'S'),
(317, '2214', 'propiedades', 1, '537.jpg', 'S'),
(318, '2215', 'propiedades', 1, '510.jpg', 'S'),
(319, '2215', 'propiedades', 1, '511.jpg', 'S'),
(320, '2215', 'propiedades', 1, '513.jpg', 'S'),
(321, '2215', 'propiedades', 1, '514.jpg', 'S'),
(322, '2215', 'propiedades', 1, '515.jpg', 'S'),
(323, '2215', 'propiedades', 1, '516.jpg', 'S'),
(324, '2215', 'propiedades', 1, '517.jpg', 'S'),
(325, '2215', 'propiedades', 1, '518.jpg', 'S'),
(326, '2215', 'propiedades', 1, '519.jpg', 'S'),
(327, '2215', 'propiedades', 1, '520.jpg', 'S'),
(328, '2215', 'propiedades', 1, '521.jpg', 'S'),
(329, '2215', 'propiedades', 1, '522.jpg', 'S'),
(330, '2215', 'propiedades', 1, '523.jpg', 'S'),
(331, '2215', 'propiedades', 1, '524.jpg', 'S'),
(332, '2215', 'propiedades', 1, '525.jpg', 'S'),
(333, '2216', 'propiedades', 1, '558.jpg', 'S'),
(334, '2216', 'propiedades', 1, '559.jpg', 'S'),
(335, '2216', 'propiedades', 1, '560.jpg', 'S'),
(336, '2216', 'propiedades', 1, '561.jpg', 'S'),
(337, '2217', 'propiedades', 1, '574.jpg', 'S'),
(338, '2217', 'propiedades', 1, '575.jpg', 'S'),
(339, '2217', 'propiedades', 1, '576.jpg', 'S'),
(340, '2218', 'propiedades', 1, '577.jpg', 'S'),
(341, '2219', 'propiedades', 1, '719.jpg', 'S'),
(342, '2219', 'propiedades', 1, '720.jpg', 'S'),
(343, '2219', 'propiedades', 1, '721.jpg', 'S'),
(344, '2219', 'propiedades', 1, '722.jpg', 'S'),
(345, '2219', 'propiedades', 1, '723.jpg', 'S'),
(346, '2224', 'propiedades', 1, '73.jpg', 'S'),
(347, '2224', 'propiedades', 1, '74.jpg', 'S'),
(348, '2224', 'propiedades', 1, '75.jpg', 'S'),
(349, '2224', 'propiedades', 1, '76.jpg', 'S'),
(350, '2224', 'propiedades', 1, '77.jpg', 'S'),
(351, '2224', 'propiedades', 1, '78.jpg', 'S'),
(352, '2224', 'propiedades', 1, '79.jpg', 'S'),
(353, '2224', 'propiedades', 1, '80.jpg', 'S'),
(354, '2224', 'propiedades', 1, '81.jpg', 'S'),
(355, '2228', 'propiedades', 1, '710.jpg', 'S'),
(356, '2228', 'propiedades', 1, '711.jpg', 'S'),
(357, '2228', 'propiedades', 1, '712.jpg', 'S'),
(358, '2228', 'propiedades', 1, '713.jpg', 'S'),
(359, '2228', 'propiedades', 1, '714.jpg', 'S'),
(360, '2228', 'propiedades', 1, '715.jpg', 'S'),
(361, '2228', 'propiedades', 1, '716.jpg', 'S'),
(362, '2228', 'propiedades', 1, '717.jpg', 'S'),
(363, '2228', 'propiedades', 1, '718.jpg', 'S'),
(364, '2231', 'propiedades', 1, '424.jpg', 'S'),
(374, '2167', 'propiedades', 1, '1833.jpg', 'S'),
(375, '2167', 'propiedades', 1, '1834.jpg', 'S'),
(376, '2167', 'propiedades', 1, '1835.jpg', 'S'),
(377, '2167', 'propiedades', 1, '1836.jpg', 'S'),
(378, '2167', 'propiedades', 1, '1837.jpg', 'S'),
(379, '2168', 'propiedades', 1, '1838.jpg', 'S'),
(380, '2168', 'propiedades', 1, '1839.jpg', 'S'),
(381, '2168', 'propiedades', 1, '1840.jpg', 'S'),
(382, '2168', 'propiedades', 1, '1841.jpg', 'S'),
(383, '2168', 'propiedades', 1, '1842.jpg', 'S'),
(384, '2169', 'propiedades', 1, '1846.jpg', 'S'),
(385, '2169', 'propiedades', 1, '1847.jpg', 'S'),
(386, '2169', 'propiedades', 1, '1848.jpg', 'S'),
(387, '2169', 'propiedades', 1, '1849.jpg', 'S'),
(388, '2169', 'propiedades', 1, '1850.jpg', 'S'),
(389, '2172', 'propiedades', 1, '1871.jpg', 'S'),
(390, '2172', 'propiedades', 1, '1872.jpg', 'S'),
(391, '2172', 'propiedades', 1, '1873.jpg', 'S'),
(392, '2172', 'propiedades', 1, '1874.jpg', 'S'),
(393, '2172', 'propiedades', 1, '1875.jpg', 'S'),
(394, '2172', 'propiedades', 1, '1876.jpg', 'S'),
(395, '2172', 'propiedades', 1, '1877.jpg', 'S'),
(396, '2191', 'propiedades', 1, '1916.jpg', 'S'),
(397, '2191', 'propiedades', 1, '1917.jpg', 'S'),
(398, '2191', 'propiedades', 1, '1918.jpg', 'S'),
(399, '2191', 'propiedades', 1, '1919.jpg', 'S'),
(400, '2191', 'propiedades', 1, '1920.jpg', 'S'),
(401, '2191', 'propiedades', 1, '1921.jpg', 'S'),
(402, '2191', 'propiedades', 1, '1922.jpg', 'S'),
(403, '2191', 'propiedades', 1, '1923.jpg', 'S'),
(404, '2191', 'propiedades', 1, '1924.jpg', 'S'),
(405, '2191', 'propiedades', 1, '1925.jpg', 'S'),
(406, '2191', 'propiedades', 1, '1926.jpg', 'S'),
(407, '2191', 'propiedades', 1, '1927.jpg', 'S'),
(408, '2191', 'propiedades', 1, '1928.jpg', 'S'),
(409, '2191', 'propiedades', 1, '1929.jpg', 'S'),
(410, '2191', 'propiedades', 1, '1930.jpg', 'S'),
(411, '2191', 'propiedades', 1, '1931.jpg', 'S'),
(412, '2191', 'propiedades', 1, '1932.jpg', 'S'),
(413, '2191', 'propiedades', 1, '1933.jpg', 'S'),
(414, '2191', 'propiedades', 1, '1934.jpg', 'S'),
(415, '2191', 'propiedades', 1, '1935.jpg', 'S'),
(416, '2191', 'propiedades', 1, '1936.jpg', 'S'),
(417, '2191', 'propiedades', 1, '1937.jpg', 'S'),
(418, '2192', 'propiedades', 1, '2076.jpg', 'S'),
(419, '2192', 'propiedades', 1, '2081.jpg', 'S'),
(420, '2192', 'propiedades', 1, '2086.jpg', 'S'),
(421, '2192', 'propiedades', 1, '2089.jpg', 'S'),
(422, '2192', 'propiedades', 1, '2100.jpg', 'S'),
(423, '2192', 'propiedades', 1, '2102.jpg', 'S'),
(424, '2192', 'propiedades', 1, '2103.jpg', 'S'),
(425, '2192', 'propiedades', 1, '2104.jpg', 'S'),
(426, '2192', 'propiedades', 1, '2105.jpg', 'S'),
(427, '2192', 'propiedades', 1, '2109.jpg', 'S'),
(428, '2192', 'propiedades', 1, '2111.jpg', 'S'),
(429, '2192', 'propiedades', 1, '2112.jpg', 'S'),
(430, '2192', 'propiedades', 1, '2113.jpg', 'S'),
(431, '2193', 'propiedades', 1, '2140.jpg', 'S'),
(432, '2193', 'propiedades', 1, '2141.jpg', 'S'),
(433, '2193', 'propiedades', 1, '2142.jpg', 'S'),
(434, '2193', 'propiedades', 1, '2146.jpg', 'S'),
(435, '2193', 'propiedades', 1, '2150.jpg', 'S'),
(436, '2193', 'propiedades', 1, '2154.jpg', 'S'),
(437, '2193', 'propiedades', 1, '2158.jpg', 'S'),
(438, '2193', 'propiedades', 1, '2165.jpg', 'S'),
(439, '2193', 'propiedades', 1, '2166.jpg', 'S'),
(440, '2193', 'propiedades', 1, '2169.jpg', 'S'),
(441, '2193', 'propiedades', 1, '2175.jpg', 'S'),
(442, '2193', 'propiedades', 1, '2178.jpg', 'S'),
(443, '2193', 'propiedades', 1, '2181.jpg', 'S'),
(444, '2193', 'propiedades', 1, '2182.jpg', 'S'),
(445, '2193', 'propiedades', 1, '2184.jpg', 'S'),
(446, '2193', 'propiedades', 1, '2185.jpg', 'S'),
(447, '2193', 'propiedades', 1, '2188.jpg', 'S'),
(448, '2199', 'propiedades', 1, '971.jpg', 'S'),
(449, '2199', 'propiedades', 1, '975.jpg', 'S'),
(450, '2199', 'propiedades', 1, '976.jpg', 'S'),
(451, '2199', 'propiedades', 1, '979.jpg', 'S'),
(452, '2199', 'propiedades', 1, '980.jpg', 'S'),
(453, '2199', 'propiedades', 1, '982.jpg', 'S'),
(454, '2199', 'propiedades', 1, '983.jpg', 'S'),
(455, '2199', 'propiedades', 1, '984.jpg', 'S'),
(456, '2199', 'propiedades', 1, '989.jpg', 'S'),
(457, '2199', 'propiedades', 1, '990.jpg', 'S'),
(458, '2199', 'propiedades', 1, '997.jpg', 'S'),
(459, '2201', 'propiedades', 1, '2058.jpg', 'S'),
(460, '2201', 'propiedades', 1, '2059.jpg', 'S'),
(461, '2201', 'propiedades', 1, '2060.jpg', 'S'),
(462, '2201', 'propiedades', 1, '2061.jpg', 'S'),
(463, '2201', 'propiedades', 1, '2063.jpg', 'S'),
(464, '2201', 'propiedades', 1, '2064.jpg', 'S'),
(465, '2201', 'propiedades', 1, '2066.jpg', 'S'),
(466, '2201', 'propiedades', 1, '2067.jpg', 'S'),
(467, '2201', 'propiedades', 1, '2068.jpg', 'S'),
(468, '2201', 'propiedades', 1, '2069.jpg', 'S'),
(469, '2201', 'propiedades', 1, '2070.jpg', 'S'),
(470, '2165', 'propiedades', 1, '2189.JPG', 'S'),
(471, '2165', 'propiedades', 1, '2191.JPG', 'S'),
(472, '2165', 'propiedades', 1, '2192.JPG', 'S'),
(473, '2165', 'propiedades', 1, '2194.JPG', 'S'),
(474, '2165', 'propiedades', 1, '2198.JPG', 'S'),
(475, '2165', 'propiedades', 1, '2199.JPG', 'S'),
(476, '2165', 'propiedades', 1, '2200.JPG', 'S'),
(477, '2165', 'propiedades', 1, '2202.JPG', 'S'),
(478, '2165', 'propiedades', 1, '2203.JPG', 'S'),
(479, '2165', 'propiedades', 1, '2204.JPG', 'S'),
(480, '2165', 'propiedades', 1, '2209.JPG', 'S'),
(481, '2165', 'propiedades', 1, '2210.JPG', 'S'),
(482, '2165', 'propiedades', 1, '2214.JPG', 'S'),
(483, '2202', 'propiedades', 1, '1882.jpg', 'S'),
(484, '2202', 'propiedades', 1, '1883.jpg', 'S'),
(485, '2205', 'propiedades', 1, '1913.jpg', 'S'),
(486, '2205', 'propiedades', 1, '1914.jpg', 'S'),
(487, '2205', 'propiedades', 1, '1915.jpg', 'S'),
(488, '2220', 'propiedades', 1, '1885.JPG', 'S'),
(489, '2220', 'propiedades', 1, '1890.JPG', 'S'),
(490, '2220', 'propiedades', 1, '1892.JPG', 'S'),
(491, '2220', 'propiedades', 1, '1896.JPG', 'S'),
(492, '2220', 'propiedades', 1, '1897.JPG', 'S'),
(493, '2220', 'propiedades', 1, '1898.JPG', 'S'),
(494, '2220', 'propiedades', 1, '1905.JPG', 'S'),
(495, '2220', 'propiedades', 1, '1909.JPG', 'S'),
(496, '2220', 'propiedades', 1, '1911.JPG', 'S'),
(497, '2220', 'propiedades', 1, '1912.jpg', 'S'),
(498, '2221', 'propiedades', 1, '1856.JPG', 'S'),
(499, '2221', 'propiedades', 1, '1858.JPG', 'S'),
(500, '2221', 'propiedades', 1, '1859.JPG', 'S'),
(501, '2221', 'propiedades', 1, '1861.JPG', 'S'),
(502, '2221', 'propiedades', 1, '1867.JPG', 'S'),
(503, '2221', 'propiedades', 1, '1878.jpg', 'S'),
(504, '2222', 'propiedades', 1, '1958.jpg', 'S'),
(505, '2222', 'propiedades', 1, '1965.jpg', 'S'),
(506, '2222', 'propiedades', 1, '1967.jpg', 'S'),
(507, '2222', 'propiedades', 1, '1969.jpg', 'S'),
(508, '2222', 'propiedades', 1, '1975.jpg', 'S'),
(509, '2222', 'propiedades', 1, '1976.jpg', 'S'),
(510, '2222', 'propiedades', 1, '1981.jpg', 'S'),
(511, '2222', 'propiedades', 1, '1983.jpg', 'S'),
(512, '2222', 'propiedades', 1, '1987.jpg', 'S'),
(513, '2222', 'propiedades', 1, '1991.jpg', 'S'),
(514, '2222', 'propiedades', 1, '1992.jpg', 'S'),
(515, '2222', 'propiedades', 1, '1993.jpg', 'S'),
(516, '2222', 'propiedades', 1, '1994.jpg', 'S'),
(517, '2222', 'propiedades', 1, '1995.jpg', 'S'),
(518, '2222', 'propiedades', 1, '2006.jpg', 'S'),
(519, '2223', 'propiedades', 1, '2220.jpg', 'S'),
(520, '2223', 'propiedades', 1, '2222.jpg', 'S'),
(521, '2223', 'propiedades', 1, '2227.jpg', 'S'),
(522, '2223', 'propiedades', 1, '2228.jpg', 'S'),
(523, '2225', 'propiedades', 1, '1843.jpg', 'S'),
(524, '2225', 'propiedades', 1, '1844.jpg', 'S'),
(525, '2225', 'propiedades', 1, '1845.jpg', 'S'),
(526, '2226', 'propiedades', 1, '1851.jpg', 'S'),
(527, '2226', 'propiedades', 1, '1852.jpg', 'S'),
(528, '2226', 'propiedades', 1, '1853.jpg', 'S'),
(529, '2226', 'propiedades', 1, '1854.jpg', 'S'),
(530, '2227', 'propiedades', 1, '2033.JPG', 'S'),
(531, '2227', 'propiedades', 1, '2035.JPG', 'S'),
(532, '2227', 'propiedades', 1, '2038.JPG', 'S'),
(533, '2227', 'propiedades', 1, '2040.JPG', 'S'),
(534, '2227', 'propiedades', 1, '2047.JPG', 'S'),
(535, '2227', 'propiedades', 1, '2048.JPG', 'S'),
(536, '2227', 'propiedades', 1, '2049.JPG', 'S'),
(537, '2227', 'propiedades', 1, '2052.JPG', 'S'),
(538, '2227', 'propiedades', 1, '2053.jpg', 'S'),
(539, '2227', 'propiedades', 1, '176195899', 'S'),
(540, '2229', 'propiedades', 1, '2054.jpg', 'S'),
(541, '2229', 'propiedades', 1, '2055.jpg', 'S'),
(542, '2229', 'propiedades', 1, '2056.jpg', 'S'),
(543, '2229', 'propiedades', 1, '2057.jpg', 'S'),
(544, '2230', 'propiedades', 1, '2114.jpg', 'S'),
(545, '2230', 'propiedades', 1, '2117.jpg', 'S'),
(546, '2230', 'propiedades', 1, '2120.jpg', 'S'),
(547, '2230', 'propiedades', 1, '2121.jpg', 'S'),
(548, '2230', 'propiedades', 1, '2122.jpg', 'S'),
(549, '2230', 'propiedades', 1, '2123.jpg', 'S'),
(550, '2230', 'propiedades', 1, '2127.jpg', 'S'),
(551, '2230', 'propiedades', 1, '2132.jpg', 'S'),
(552, '2230', 'propiedades', 1, '2133.jpg', 'S'),
(553, '2230', 'propiedades', 1, '2134.jpg', 'S'),
(554, '2230', 'propiedades', 1, '2135.jpg', 'S'),
(555, '2230', 'propiedades', 1, '2136.jpg', 'S'),
(556, '2232', 'propiedades', 1, '1793.jpg', 'S'),
(557, '2232', 'propiedades', 1, '1797.jpg', 'S'),
(558, '2232', 'propiedades', 1, '1801.jpg', 'S'),
(559, '2232', 'propiedades', 1, '1803.jpg', 'S'),
(560, '2232', 'propiedades', 1, '1808.jpg', 'S'),
(561, '2232', 'propiedades', 1, '1812.jpg', 'S'),
(562, '2232', 'propiedades', 1, '1814.jpg', 'S'),
(563, '2232', 'propiedades', 1, '1815.jpg', 'S'),
(564, '2232', 'propiedades', 1, '1817.jpg', 'S'),
(565, '2232', 'propiedades', 1, '1819.jpg', 'S'),
(566, '2232', 'propiedades', 1, '1821.jpg', 'S'),
(587, '2197', 'propiedades', 1, '2249.JPG', 'S'),
(588, '2197', 'propiedades', 1, '2250.JPG', 'S'),
(589, '2197', 'propiedades', 1, '2251.JPG', 'S'),
(590, '2197', 'propiedades', 1, '2252.JPG', 'S'),
(591, '2197', 'propiedades', 1, '2253.JPG', 'S'),
(592, '2197', 'propiedades', 1, '2254.JPG', 'S'),
(593, '2197', 'propiedades', 1, '2255.JPG', 'S'),
(594, '2197', 'propiedades', 1, '2256.JPG', 'S'),
(595, '2197', 'propiedades', 1, '2257.JPG', 'S'),
(596, '2197', 'propiedades', 1, '2258.JPG', 'S'),
(597, '2197', 'propiedades', 1, '2259.JPG', 'S'),
(598, '2197', 'propiedades', 1, '2260.JPG', 'S'),
(599, '2197', 'propiedades', 1, '2261.JPG', 'S'),
(600, '2197', 'propiedades', 1, '2262.JPG', 'S'),
(601, '2197', 'propiedades', 1, '2263.JPG', 'S'),
(602, '2197', 'propiedades', 1, '2264.JPG', 'S'),
(603, '2197', 'propiedades', 1, '2265.JPG', 'S'),
(604, '2197', 'propiedades', 1, '2266.JPG', 'S'),
(605, '2197', 'propiedades', 1, '2267.JPG', 'S'),
(606, '2197', 'propiedades', 1, '2268.JPG', 'S'),
(607, '2197', 'propiedades', 1, '2269.JPG', 'S'),
(608, '2197', 'propiedades', 1, '2270.JPG', 'S'),
(609, '2197', 'propiedades', 1, '2271.JPG', 'S'),
(610, '2197', 'propiedades', 1, '2272.JPG', 'S'),
(611, '2197', 'propiedades', 1, '2273.JPG', 'S'),
(612, '2235', 'propiedades', 1, '2329.jpg', 'S'),
(613, '2235', 'propiedades', 1, '2330.jpg', 'S'),
(614, '2235', 'propiedades', 1, '2332.jpg', 'S'),
(615, '2235', 'propiedades', 1, '2333.jpg', 'S'),
(616, '2235', 'propiedades', 1, '2334.jpg', 'S'),
(617, '2235', 'propiedades', 1, '2335.jpg', 'S'),
(618, '2214', 'propiedades', 1, '2274.JPG', 'S'),
(619, '2214', 'propiedades', 1, '2275.JPG', 'S'),
(620, '2214', 'propiedades', 1, '2276.JPG', 'S'),
(621, '2214', 'propiedades', 1, '2277.JPG', 'S'),
(622, '2214', 'propiedades', 1, '2278.JPG', 'S'),
(623, '2214', 'propiedades', 1, '2279.JPG', 'S'),
(624, '2214', 'propiedades', 1, '2280.JPG', 'S'),
(625, '2236', 'propiedades', 1, '2337.jpg', 'S'),
(626, '2236', 'propiedades', 1, '2338.jpg', 'S'),
(627, '2236', 'propiedades', 1, '2339.jpg', 'S'),
(628, '2236', 'propiedades', 1, '2340.jpg', 'S'),
(652, '175', 'desarrollos', 4, '175_4_6a1cb9c3226b44837ae52c4ce9173604_175_4_f1c4d92c610dc8b2b71a312fef75b71f_Render-LAS_LORENZAS-Ingreso-xs.jpg', 'S'),
(653, '175', 'desarrollos', 6, '175_6_a0d34024aa07dac336094d6ec15bfa85_kjhd_sdf_sadfas_asdfa_dfa.JPG', 'S'),
(654, '175', 'desarrollos', 7, '175_7_abca84c3981393820d6fcf16816ae2c4_R0010021.jpg', 'N'),
(655, '175', 'desarrollos', 7, '175_7_483b251f75dcc76af357831950ce9603_R0010021_SMALL.jpg', 'S'),
(656, '175', 'desarrollos', 5, '175_5_21a8c511eb4f1e24f922a4de2e0ecc35_img-14430372399.jpg', 'S'),
(657, '175', 'desarrollos', 5, '175_5_9c18c5737352585828045248f23940be_img-14430372394.jpg', 'S');

-- --------------------------------------------------------

--
-- Table structure for table `sys_attach_refs`
--

DROP TABLE IF EXISTS `sys_attach_refs`;
CREATE TABLE IF NOT EXISTS `sys_attach_refs` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE latin1_bin NOT NULL,
  `table_name` varchar(255) COLLATE latin1_bin NOT NULL,
  `activo` text COLLATE latin1_bin NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 COLLATE=latin1_bin AUTO_INCREMENT=8 ;

--
-- Dumping data for table `sys_attach_refs`
--

INSERT INTO `sys_attach_refs` (`id`, `name`, `table_name`, `activo`) VALUES
(1, 'Imagen principal', 'propiedades', 'S'),
(2, 'Imagen 360º', 'propiedades', 'S'),
(3, 'Video (URL)', 'propiedades', 'S'),
(4, 'Imagen principal', 'desarrollos', 'S'),
(5, 'Imagenes generales', 'desarrollos', 'S'),
(6, 'Logo del desarrollo', 'desarrollos', 'S'),
(7, 'Imagen 360º', 'desarrollos', 'S');

-- --------------------------------------------------------

--
-- Table structure for table `sys_refs`
--

DROP TABLE IF EXISTS `sys_refs`;
CREATE TABLE IF NOT EXISTS `sys_refs` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `fecha_creado` datetime DEFAULT NULL,
  `fecha_modificado` datetime DEFAULT NULL,
  `estado` int(11) NOT NULL DEFAULT '0',
  `nombre` text COLLATE latin1_bin,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 COLLATE=latin1_bin AUTO_INCREMENT=5 ;

--
-- Dumping data for table `sys_refs`
--

INSERT INTO `sys_refs` (`id`, `fecha_creado`, `fecha_modificado`, `estado`, `nombre`) VALUES
(1, '2016-10-09 01:32:52', '2017-01-09 23:54:39', 1, 'Estado'),
(2, '2016-10-08 20:12:38', '2017-01-09 23:54:37', 1, 'Tipo de propiedad'),
(3, '2016-10-08 22:05:18', '2016-10-08 22:05:18', 1, 'Moneda'),
(4, '2016-10-08 20:12:30', '2016-10-09 01:33:12', 1, 'Tipo de operación');

-- --------------------------------------------------------

--
-- Table structure for table `sys_refs_afirmaciones`
--

DROP TABLE IF EXISTS `sys_refs_afirmaciones`;
CREATE TABLE IF NOT EXISTS `sys_refs_afirmaciones` (
  `id` char(1) COLLATE latin1_bin NOT NULL,
  `date_created` datetime DEFAULT NULL,
  `date_modified` datetime DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT '0',
  `name` text COLLATE latin1_bin,
  `slug` text COLLATE latin1_bin,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_bin;

--
-- Dumping data for table `sys_refs_afirmaciones`
--

INSERT INTO `sys_refs_afirmaciones` (`id`, `date_created`, `date_modified`, `status`, `name`, `slug`) VALUES
('N', '2017-01-10 00:45:55', '2017-01-10 23:10:46', 1, 'No', 'no'),
('S', '2017-01-10 00:46:11', '2017-01-10 23:10:45', 1, 'Si', 'si');

-- --------------------------------------------------------

--
-- Table structure for table `sys_refs_childs`
--

DROP TABLE IF EXISTS `sys_refs_childs`;
CREATE TABLE IF NOT EXISTS `sys_refs_childs` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `date_created` datetime DEFAULT NULL,
  `date_modified` datetime DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT '0',
  `ref_id` int(11) NOT NULL DEFAULT '0',
  `ref_profit_id` int(11) NOT NULL DEFAULT '0',
  `name` text COLLATE latin1_bin,
  `slug` text COLLATE latin1_bin,
  `activo` text COLLATE latin1_bin,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 COLLATE=latin1_bin AUTO_INCREMENT=15 ;

--
-- Dumping data for table `sys_refs_childs`
--

INSERT INTO `sys_refs_childs` (`id`, `date_created`, `date_modified`, `status`, `ref_id`, `ref_profit_id`, `name`, `slug`, `activo`) VALUES
(1, '2016-10-09 01:33:35', '2017-01-09 23:54:28', 1, 1, 1, 'Activo', 'activo', 'S'),
(2, '2016-10-09 01:33:52', '2017-01-09 23:54:27', 1, 1, 1, 'Inactivo', 'inactivo', 'S'),
(3, '2016-10-08 20:13:12', '2017-01-09 23:54:23', 1, 2, 2, 'Casa', 'casa', 'S'),
(4, '2016-10-08 20:13:23', '2017-01-09 23:54:25', 1, 2, 1, 'Departamento', 'departamento', 'S'),
(5, '2016-10-08 22:05:34', '2016-10-16 22:10:34', 1, 3, 1, '$', 'pesos', 'S'),
(6, '2016-10-08 22:05:49', '2016-10-16 22:10:37', 1, 3, 2, 'U$D', 'dolares', 'S'),
(7, '2016-10-08 22:06:26', '2016-10-16 22:10:40', 1, 3, 3, 'EUR', 'euros', 'S'),
(8, '2016-10-08 20:12:57', '2016-10-16 22:10:44', 1, 4, 0, 'Alquiler', 'alquiler', 'S'),
(9, '2016-10-08 20:13:04', '2016-10-16 22:10:45', 1, 4, 0, 'Venta', 'venta', 'S'),
(10, '2017-02-03 20:45:22', '2017-02-03 20:45:24', 1, 2, 3, 'Local', 'local', 'S'),
(11, '2017-02-03 20:45:33', '2017-02-03 20:45:26', 1, 2, 4, 'Terreno', 'terreno', 'S'),
(12, '2017-02-03 20:45:32', '2017-02-03 20:45:27', 1, 2, 5, 'Oficina', 'oficina', 'S'),
(13, '2017-02-03 20:45:31', '2017-02-03 20:45:28', 1, 2, 15, 'Depto. Duplex', 'depto-duplex', 'S'),
(14, '2017-02-03 20:45:30', '2017-02-03 20:45:28', 1, 2, 19, 'Quinta', 'quinta', 'S');

-- --------------------------------------------------------

--
-- Table structure for table `sys_refs_tipo_propiedad`
--

DROP TABLE IF EXISTS `sys_refs_tipo_propiedad`;
CREATE TABLE IF NOT EXISTS `sys_refs_tipo_propiedad` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `date_created` datetime DEFAULT NULL,
  `date_modified` datetime DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT '0',
  `name` text COLLATE latin1_bin,
  `slug` text COLLATE latin1_bin,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 COLLATE=latin1_bin AUTO_INCREMENT=3 ;

--
-- Dumping data for table `sys_refs_tipo_propiedad`
--

INSERT INTO `sys_refs_tipo_propiedad` (`id`, `date_created`, `date_modified`, `status`, `name`, `slug`) VALUES
(1, '2017-01-10 01:10:57', '2017-01-10 01:10:58', 1, 'Departamento', 'departamento'),
(2, '2017-01-10 01:11:17', '2017-01-10 01:11:19', 1, 'Casa', 'casa');

-- --------------------------------------------------------

--
-- Table structure for table `sys_users`
--

DROP TABLE IF EXISTS `sys_users`;
CREATE TABLE IF NOT EXISTS `sys_users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` text NOT NULL,
  `password` text NOT NULL,
  `psalt` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `sys_users`
--

INSERT INTO `sys_users` (`id`, `username`, `password`, `psalt`) VALUES
(1, 'admin', '5549f05a900126a5f547c96080c342b780db8ea5fa80ca0bfaaa418bcc4bbd1e', 's*vl%/?s8b*b4}b/w%w4'),
(2, 'info@curtopropiedades.com.ar', '5549f05a900126a5f547c96080c342b780db8ea5fa80ca0bfaaa418bcc4bbd1e', 's*vl%/?s8b*b4}b/w%w4');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
