-- phpMyAdmin SQL Dump
-- version 4.6.6deb4+deb9u2
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost:3306
-- Tiempo de generación: 23-04-2025 a las 14:01:56
-- Versión del servidor: 10.1.48-MariaDB-0+deb9u2
-- Versión de PHP: 7.0.33-0+deb9u12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `bcfexa`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `actividad`
--

CREATE TABLE `actividad` (
  `NroResolucion` varchar(45) NOT NULL,
  `NroExpediente` varchar(45) NOT NULL,
  `NroConvenioMarco` varchar(45) NOT NULL,
  `Fecha_inicio` date DEFAULT NULL,
  `Fecha_final` date DEFAULT NULL,
  `Resumen` varchar(1000) DEFAULT NULL,
  `Objetivo` varchar(200) DEFAULT NULL,
  `TipoActividad_Id` int(11) NOT NULL,
  `PlazoRenovacion` tinyint(4) DEFAULT NULL,
  `RenovacionAutomatica` int(10) NOT NULL,
  `Id` int(11) NOT NULL,
  `UbicacionArchivo_Id` int(11) NOT NULL,
  `Informe_Id` int(11) NOT NULL,
  `MonedaOrganizacion_Id` int(11) NOT NULL,
  `InversionOrganizacion` float NOT NULL,
  `NotaInversionOrganizacion` varchar(5000) NOT NULL,
  `MonedaUnidad_Id` int(11) NOT NULL,
  `InversionUnidad` float NOT NULL,
  `NotaInversionUnidad` varchar(5000) NOT NULL,
  `NroResolucion_Asociada` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `actividad`
--

INSERT INTO `actividad` (`NroResolucion`, `NroExpediente`, `NroConvenioMarco`, `Fecha_inicio`, `Fecha_final`, `Resumen`, `Objetivo`, `TipoActividad_Id`, `PlazoRenovacion`, `RenovacionAutomatica`, `Id`, `UbicacionArchivo_Id`, `Informe_Id`, `MonedaOrganizacion_Id`, `InversionOrganizacion`, `NotaInversionOrganizacion`, `MonedaUnidad_Id`, `InversionUnidad`, `NotaInversionUnidad`, `NroResolucion_Asociada`) VALUES
('R07/19', '', '', '2019-03-12', '2022-03-12', 'Las partes acuerdan implementar Programas de Prácticas Pre Profesionales Asistidas Supervisadas o de Verano (PPP/PPAC) y Escuelas Regionales de Campo (ERC) específicas, con la finalidad de contribuir en la formación académica y capacitación de alumnos de las carreras de Geología de ambas Instituciones, otorgándoles la posibilidad de obtener conocimientos, prácticas y herramientas propias del ejercicio de la función como profesional geólogo', '                                                  ', 1, 36, 1, 12, 0, 0, 1, 0, '', 1, 0, '', ''),
('R88/21', '02-1038-T-21', '0', '2022-12-26', '2022-12-31', 'la EMPRESA, y la FACULTAD, perteneciente a la UNSJ, acuerdan las condiciones del Servicio a Terceros (ST) solicitado por la EMPRESA a la FACULTAD, conducente a realizar el estudio de geoformas glaciales, periglaciales y peligros geológicos en el proyecto minero Piuquenes, situado en el departamento de Calingasta, provincia de San Juan												', 'Estudio geomorfológico preliminar, con énfasis en geoformas glaciares y periglaciales y evaluación de los peligros geológicos endógenos (volcanes y sismos) y exógenos (inundaciones, procesos de remoci', 1, 0, 0, 13, 0, 0, 2, 9000, 'Debe aclararse que todo el equipo técnico es personal de la Facultad, quienes percibirán el equivalente a US$ 9000 (en pesos según cotización Banco Nación) en concepto de honorarios (restando el 12% retenido por la Facultad según Ordenanza 01-2014-CD. FCEFN). A esto se sumarán U$$ 200/día de trabajo de terreno (se considera día de terreno desde el día 1 de salida desde la casa hasta el último día de regreso a la casa). Se estiman 3 días de trabajo de campo para la revisión de las tareas efectuadas en gabinete. Los gastos de traslado y movilidad serán provistos por la empresa', 1, 0, 'El cronograma de actividades estará sujeto a la posibilidad de acceder al instrumental disponible en', ''),
('R85/21', '02-0805-A-21', 'Convenio Editado', '2021-12-21', '2025-12-21', 'La Facultad, a través del Departamento de Biología, y el Colegio, se comprometen a establecer como objeto de la presente Acta Complementaria es generar un marco de colaboración en actividades de mutuo interés por su trascendencia social, cultural y educativa de estudiantes y profesionales de las Ciencias Biológicas												', '.  											    ', 3, 0, 1, 14, 0, 0, 1, 0, 'Para la concreción de las acciones propuestas en la cláusula segunda las partes se comprometen a gestionar conjunta o separadamente ante otros organismos públicos y privados, nacionales e internacionales, los recursos financieros necesarios para la implementación de los mismos.', 1, 0, '.', ''),
('R107/22', '02-1645-22', '', '2022-10-25', '2023-10-25', 'La SEAyDS y la FACULTAD se comprometen a realizar acciones conjuntas tendientes a desarrollar el relevamiento y propuesta de monitoreo de la mastofauna y avifauna del Parque Provincial Manantiales, Calingasta, San Juan', '           ', 1, 0, 0, 15, 0, 0, 1, 0, 'La SEAyDS, facilitará apoyo logístico, técnico, permisos y seguros correspondientes de traslado, alojamiento, manutención e insumos para el equipamiento que serán manipulados por los equipos de la FACULTAD para la concreción de las actividades', 1, 0, '', ''),
('R51/21', '4', '', '2021-09-07', '2021-12-31', 'Entre la EMPRESA, que es parte de Yamana Gold, y la FACULTAD, perteneciente a la UNSJ, se acordarán las condiciones del Servicio a Terceros (ST) solicitado por la EMPRESA a la FACULTAD, conducente a realizar la Descripción Petrográfica de muestras provistas por la EMPRESA, pertenecientes al proyecto minero Las Flechas y Evelina, situado en la provincia de San Juan', '', 1, 0, 0, 16, 0, 0, 1, 120200, 'Incluyendo: 1) preparación de cortes en el Laboratorio de Petrotomía de la UNSJ (25000 pesos, 1500 c/corte), b) honorario (95200 pesos, 5600 c/muestra, equivalentes a 55 dólares según el cambio oficial Banco Nación). El importe total será asumido por la EMPRESA y facturado/cobrado a través del Fondo Universitario, en un plazo no mayor a 20 días a partir de la entrega del Informe asociado al ST solicitado', 1, 0, 'El cronograma de actividades estará sujeto a la posibilidad de acceder al instrumental disponible en la FACULTAD, debido a los protocolos vigentes por COVID-19', ''),
('R96/21-CD-FCEFN ', '02-1797-D-21', '', '2022-03-29', '2024-03-29', 'Entre la SEAyDS y la FACULTAD, se implementarán acciones conjuntas tendientes a difundir resultados científicos, producidos por docentes-investigadores del Departamento de Geología de la Universidad Nacional de San Juan, de interés para el conjunto de la sociedad  sanjuanina												', '  											    ', 1, 0, 0, 17, 0, 0, 1, 500000, '', 1, 0, '', ''),
('R65/22', '', '', '2022-08-16', '2024-08-18', 'La presente Acta Complementaria tiene por objeto formalizar actividades Científicas, Técnicas y de Extensión entre LAS FACULTADES en el marco del proyecto de extensión denominado “Geoparque Cerro de Valdivia: Acciones estratégicas participativas para su desarrollo”. Aprobado por Resolución -2022-32-APN-SECPU-ME como continuidad de Proyecto Propuesta de Creación del Geoparque Cerro de Valdivia (Pocito). Una nueva alternativa al turismo tradicional', '', 1, 24, 1, 18, 0, 0, 1, 0, '', 1, 0, 'Se contará con los traslados de la movilidad de la Municipalidad de Pocito o UNSJ. En ambos casos se coordinará con tiempo suficiente. ', ''),
('R04/22', '', '', '2022-03-15', '2023-03-15', 'Las partes acuerdan en iniciar formalmente el proyecto EU61- UNSJ15691 Competencias digitales Chimbas, cuyo financiamiento parcial corresponde a la Secretaría de Políticas Universitarias del Ministerio de Educación', '', 1, 0, 0, 19, 0, 0, 1, 0, 'LA MUNICIPALIDAD, se comprometen proporcionar un espacio físico para el dictado de talleres y conferencias y coordinar los aspectos organizativos con las escuelas, los que podrán participar en forma voluntaria y gratuita de la Diplomatura de Extensión en Competencias Digitales para la Virtualidad, aprobada por Ordenanza. 3-2021-CD-FCEFN y Resol 110-2021-CD- FCEFN', 1, 0, '', ''),
('R19/22', '', '', '2022-04-19', '2023-04-19', 'Implementar en el ámbito de la UNSJ la Diplomatura en Extensión Universitaria en Prácticas Socioeducativas, contenidos formativos en el desarrollo de un trayecto curricular, de abordaje interdisciplinario y en trabajo conjunto con diferentes territorios. ', '', 3, 12, 1, 20, 0, 0, 1, 400000, '200.000 FAUD; 200.000 EUCS', 1, 200000, '', ''),
('R03/22', '02-0157-S-22 ', '', '2022-03-15', '2023-03-15', 'Las partes acuerdan en iniciar formalmente el proyecto EU61- UNSJ15733 Competencias digitales Rawson, cuyo financiamiento parcial corresponde a la Secretaría de Políticas Universitarias del Ministerio de Educación', '', 1, 0, 0, 21, 0, 0, 1, 0, 'LA MUNICIPALIDAD, se comprometen proporcionar un espacio físico para el dictado de talleres y conferencias y coordinar los aspectos organizativos con las escuelas, los que podrán participar en forma voluntaria y gratuita de la Diplomatura de Extensión en Competencias Digitales para la Virtualidad', 1, 0, '', ''),
('R108/22', '02-1762-22', '', '2022-10-25', '2023-10-25', 'Dictar una DIPLOMATURA EN CIBERDELITOS Y ANÁLISIS DE EVIDENCIA DIGITAL, a través de una capacitación Teórica Práctica												', '											    ', 1, 12, 1, 22, 0, 0, 1, 0, '', 1, 0, 'La diplomatura será dictada en marzo del 2023 por acuerdo con la Secretaría de Estado de Seguridad y Orden Público', ''),
('R103/22', '02-1706-22', '', '2022-10-25', '2023-10-25', 'LA SEAyDS, a través de la Dirección de Conservación y Áreas Protegidas, en adelante DCyAP, y la FACULTAD, realizarán acciones conjuntas tendientes a evaluar y generar datos técnicos científicos en el Parque Provincial Presidente Sarmiento', '', 1, 12, 1, 23, 0, 0, 1, 0, '', 1, 0, '', ''),
('R113/22', '', '', '2022-12-27', '2024-12-27', 'LA STyT y la FACULTAD, realizarán acciones conjuntas tendientes a construir una solución de Inteligencia de Negocios a partir de datos provenientes de la STyT												', 'Aplicar Inteligencia de Negocios en la Secretaría de Tránsito y Transporte (STyT) para brindar apoyo a la toma de decisiones											    ', 1, 24, 1, 24, 0, 0, 1, 0, '', 1, 0, '0', ''),
('R08/19-CD-FCEFN', '02-0111-S-19', '', '2019-03-12', '2020-03-20', 'Entre la FACULTAD y el MINISTERIO, se acuerda en la necesidad de realizar acciones conjuntas, tendientes a complementar la formación curricular de docentes del Sistema Educativo Provincial, en temas del quehacer científico vinculados con la Astronomía y Ciencias de la Tierra.																																																																																				', '											    											    											    											    											    											    											    ', 1, 0, 0, 25, 0, 0, 1, 35000, 'Profesor Resposable: $20.000 por cada dictado de taller; Profesores Asistentes: $15.000 por cada dictado de taller', 1, 0, '', ''),
('R78/23', '02-1155-2023', 'd', '2023-08-14', '2024-08-14', 'Promover la cooperación mutua entre el SEGEMAR y el Gabinete de Geología Económica del INGEO.																																																																																																																																				', 'Promover la cooperación mutua entre el SEGEMAR y el Gabinete de Geología Económica del INGEO.											    											    											    											    											    											    											    		', 1, 0, 0, 26, 0, 0, 1, 0, '', 1, 0, '', ''),
('R121/22', '02-2230-2022', '', '2023-06-05', '2027-06-05', 'La Facultad, a través del Depto. de Geofísica y Astronomía y el Colegio, se comprometen a establecer como objeto de la presente Acta Complementaria un marco de colaboración en actividades de mutuo interés por su trascendencia social, cultural y educativa ', 'a.	Implementar acciones tendientes al desarrollo de actividades vinculadas a la inserción laboral de los Licenciados en Geofísica, en ámbitos estatales y privados. b.	Impulsar acciones tendientes al d', 1, 0, 1, 27, 0, 0, 1, 0, '', 1, 0, '', ''),
('R109/23', '02-1500-2023', '', '2023-12-15', '2024-12-31', 'Acciones conjuntas y colaborativas, conducentes a realizar un estudio geológico y metalogenético de detalle en el depósito diseminado de cobre-oro conocido como Josemaría, en el Departamento Iglesia, Provincia de San Juan. \r\nConocer las características geológicas relacionadas con los procesos metalogenéticos que puedan contribuir a generar nuevas herramientas que orienten la exploración de este tipo de depósitos a escala local y regional y acrecentar el conocimiento de los recursos minerales de la región. 																								', 'Acciones conjuntas y colaborativas, conducentes a realizar un estudio geológico y metalogenético de detalle en el depósito diseminado de cobre-oro conocido como Josemaría, en el Departamento Iglesia, ', 1, 12, 1, 28, 0, 0, 1, 0, '', 1, 0, ' ', ''),
('22/2023-CD-FCEFN', '02-2425-2022', '', '2023-08-18', '2024-08-18', 'La SEADyS, a través del Parque de la Biodiversidad (PDB) y la FACULTAD, realizarán acciones conjuntas vinculadas con la formación y capacitación de estudiantes de la Tecnicatura y Licenciatura en Biología y personal técnico del PDB, mediante diversas acciones de acuerdo con los objetos y actividades que las PARTES desarrollan.', 'La SEADyS, a través del Parque de la Biodiversidad (PDB) y la FACULTAD, realizarán acciones conjuntas vinculadas con la formación y capacitación de estudiantes de la Tecnicatura y Licenciatura en Biol', 1, 12, 1, 29, 0, 0, 1, 0, '', 1, 0, ' ', ''),
('97/2023-CD-FCEFN', '02-1469-2023', '', '2023-09-14', '2024-09-14', 'Abordar aspectos relacionados a la exploración minera de la provincia de San Juan, a fin de contribuir a definir y ampliar las áreas de exploración y formar recursos humanos, en favor del bien común. Abordar aspectos relacionados a la exploracion minera de la provinia de San Juan, a fin de contribuir a definir y ampliar las áreas de exploración y formar recursos humanos, en favor del bien común. \r\n', 'El IPEEM cederá en comodato al Gabinete de Mineralogía y Petrografía del INGEO, un Microscopio Leica, modelo DM 750p, para trabajo con luz LED transmitida, reflejada y reflejada oblicua en campo claro', 1, 60, 1, 30, 0, 0, 1, 0, '', 1, 0, ' ', ''),
('88/2022-CD-FCEFN', '02-1345-2023', '', '2022-12-19', '2025-12-19', 'Renovar Acta de referencia y modificar la cláusula octava de la misma, sobre la vigencia del Acta. ', 'Renovar Acta de referencia y modificar la cláusula octava de la misma, sobre la vigencia del Acta. ', 8, 36, 1, 31, 0, 0, 1, 0, '', 1, 0, ' ', ''),
('105/2021-CD-FCEFN', '02-1288-2021', '', '2022-10-17', '2025-10-17', 'Promover el desarrollo de sus programas de postgrado a través de las siguientes actividades conjuntas:\r\nA. Investigación en Astrofísica, Astronomía y en temas de interés común.\r\nB. Supervisión y co-dirección de estudiantes de Doctorado y Magister.\r\nC. Dictado de clases especializadas.\r\nD. Co-organización de seminarios, talleres y reuniones nacionales e internacionales.\r\nE. Difusión de la Astronomía en sentido amplio (a nivel universitario, secundario y primario y preescolar, así como a todo público).', 'Promover el desarrollo de sus programas de postgrado a través de las siguientes actividades conjuntas:\r\nA. Investigación en Astrofísica, Astronomía y en temas de interés común.\r\nB. Supervisión y co-di', 1, 36, 1, 32, 0, 0, 1, 0, '', 1, 0, ' ', ''),
('493/2023-FCEFN', '02-728-2023', '', '2023-04-27', '2023-10-27', 'Dar inicio formal al proyecto \"Hacia una comunidad tecnológica: Creación del nodo tecnológico y fortalecimiento de los puntos digitales para la formación, innovación, capacitación y desarrollo científico-tecnológico para el acceso igualitario del conocimiento en el Depto. de San Martín. ', 'Dar inicio formal al proyecto \"Hacia una comunidad tecnológica: Creación del nodo tecnológico y fortalecimiento de los puntos digitales para la formación, innovación, capacitación y desarrollo científ', 1, 0, 0, 33, 0, 0, 1, 100000, 'La Municipalidad se compromete a proporcionar la infraestructura adecuada para la formación, capacitación y desarrollo de las actividades especificadas en los Anexos. Como tambien coordinar los aspectos organizativos con los destinatarios. La Municipalidad designa al Lic. Anibal Armando Alvarez como director del proyecto, encargado de coordinar y dirigir las acciones pertinentes a la ejecución de todas las actividades, como también labrará los informes de avance y evaluación final del proyecto. ', 1, 100000, ' La Facultad establece como Unidades Ejecutoras de las actividades al Depto. De Informática y al Instituto de Informática y designa a la Magister Lic. Alejandra Otazú, quien tendrá la responsabilidad de coordinar las actividades académicas establecidas en los anexos. ', ''),
('108-2023-CS', '02-442-2023', '', '2023-07-01', '2024-05-01', 'Realizar tareas de investigación y desarrollo en conjunto. Proyectos: Alta Web Empresas y GESTAR\r\n', 'Realizar tareas de investigación y desarrollo en conjunto. Proyectos: Alta Web Empresas y GESTAR\r\n', 11, 0, 0, 34, 0, 0, 1, 3960000, '', 1, 0, ' ', ''),
('40/2023-FCEFN', '02-101-2023', '', '2023-02-22', '2025-02-22', 'Las partes acuerdan implementar Programas de Prácticas Pre Profesionales (PPP) Asistidas, Supervisadas o de verano, Escuelas Regionales de Campo (ERC) específcas y programas de movilidad estudiantil, con la finalidad de contribuir en la formación académica, de investigación participativa y extensión de estudiantes de las carreras de Geología y otras afines de ambas como también de obtener conocimientos teóricos-práctico y herramientas propias del ejercicio de la función, como futuros profesionales en Ciencias Geológicas. \r\n', 'Las partes acuerdan implementar Programas de Prácticas Pre Profesionales (PPP) Asistidas, Supervisadas o de verano, Escuelas Regionales de Campo (ERC) específcas y programas de movilidad estudiantil, ', 1, 24, 1, 35, 0, 0, 1, 0, '', 1, 0, ' ', ''),
('41/2023-FCEFN', '02-102-2023', '', '2023-02-28', '2025-02-28', 'Formalizar actividades y acciones científicas, académicas y tecnológicas por parte de los docentes, estudiantes y graduados de las carreras de Geología e Ingeniería de Minas y otras pertenecientes al DACyTAPAU de la UNLaR, en el IGSV, a los fines de aprovechar el potencial académico y de formación del IGSV para las ciencias de la Tierra.\r\nLas acciones previstas se desarrollarán bajo el Programa Permanente de Transferencia Educativa y la Escuela de Campo de Geofísica en San Juan\r\n', 'Formalizar actividades y acciones científicas, académicas y tecnológicas por parte de los docentes, estudiantes y graduados de las carreras de Geología e Ingeniería de Minas y otras pertenecientes al ', 1, 24, 1, 36, 0, 0, 1, 0, '', 1, 0, ' ', ''),
('115/23-CS', '02-564-2023', '', '2023-07-26', '2023-11-26', 'Realizar análisis Neotectónico del Proyecto Pirquitas, situado en el Depto. Rinconada, en Provincia de Jujuy. ', '\"Detección, delimitación y determinación de morfoestructuras con actividad tectónica cuaternaria\r\nAnálisis de la amenaza sísmica\r\nElaboración y entrega de un informe neotectónico preliminar a los 30 d', 10, 0, 0, 37, 0, 0, 2, 18000, '', 1, 0, ' ', ''),
('R94/22', '', '', '2023-06-14', '2027-06-14', 'Marco de colaboración en actividades de mutuo interés por su trascendencia social, cultural y educativa', 'Implementar acciones tendientes al desarrollo de actividades vinculadas a la inserción laboral de los Licenciados en Geología, en ámbitos estatales y privados.\r\nb. Desarrollar acciones tendientes al d', 1, 48, 1, 38, 0, 0, 1, 0, '', 1, 0, ' ', ''),
('1/2024-FCEFN', '', '', '2024-02-20', '2026-02-20', 'Colaboración mutua en actividades científicas, académicas, técnicas, de extensión y capacitación, enmarcadas en los programas de trabajo que tengan relación con sus objetivos', 'Establecer Programas de Prácticas Profesionales Asistidas (PPA)\r\nProponer charlas y capacitaciones técnicas destinadas a personal de ambas partes\r\nImplementar actividades mutuas de cooperación y aseso', 1, 24, 1, 39, 0, 0, 1, 0, '', 1, 0, ' ', ''),
('-', '', '', '2023-09-11', '2024-09-11', 'Asumir en forma conjunta el compromiso y voluntad de aunar esfuerzos para la ejecución del proyecto \"Aplicación del Método Transiente Electromagnético (T.E.M.) cuyo objeto es realizar la Exploración y posterior Explotación de Agua Subterránea en la localidad Encón-Departamento 25 de mayo\", a fin de brindar una solución a la necesidad de agua que tienen las comunidades Huarpes establecidas en la zona. ', 'Asumir en forma conjunta el compromiso y voluntad de aunar esfuerzos para la ejecución del proyecto \"Aplicación del Método Transiente Electromagnético (T.E.M.) cuyo objeto es realizar la Exploración y', 16, 0, 0, 40, 0, 0, 1, 0, '', 1, 0, ' ', ''),
('-', '', '', '2023-06-27', '2024-06-27', 'Promover la formación de estudiantes e intercambio de docentes de ambas instituciones desde una perspectiva global a través de trabajo colaborativo entre cátedras de la FCEFN-UNSJ y de la FC-ULS\r\nDesarrollar competencias interculturales a través de experiencias de alto impacto de modo de garantizar la dimensión internacional e intercultural en la formación de los estudiantes. ', 'Generación de aulas espejo de las cátedras de las carreras de grado afines de la FCEFN-UNSJ y de la FC-ULS\r\nPlanificación y desarrollo de actividades de posgrado, de acuerdo a los mecanismos a estable', 6, 0, 0, 41, 0, 0, 1, 0, '', 1, 0, ' ', ''),
('48/23-CS', '', '', '2022-09-09', '2023-09-30', 'Acordar la ubicación del sitio y el acceso para la instrumentación que NAR instalará en la Estación Astronómica Carlos U. Cesco del Observatorio Astronómico Félix Aguilar, administrado por la UNSJ. La instrumentación consistirá en un radiómetro, una estación meteorológica y el equipo de recopilación de datos asociado y se utilizará para probar la viabilidad del sitio para la posible ubicación del Observatorio de Magnetismo Solar Coronal (COSMO), resultados que serán compartidos por ambas partes. La ubicación específica para el equipo será al norte del telescopio solar. ', 'Acordar la ubicación del sitio y el acceso para la instrumentación que NAR instalará en la Estación Astronómica Carlos U. Cesco del Observatorio Astronómico Félix Aguilar, administrado por la UNSJ. La', 11, 36, 1, 42, 0, 0, 1, 0, '', 1, 0, ' Si las partes acuerdan mutuamente se extenderá hasta el 1 de junio de 2027', ''),
('R119/22', '', '', '2022-12-27', '2024-12-27', 'Implementar Programas de Prácticas Pre Profesionales (PPP) Asistidas Supervisadas o de Verano y Escuelas Regionales de Campo específicas (ERC), con la finalidad de contribuir en la formación académica, de investigación participativa y extensión de estudiantes de las carreras de Geología de ambas Instituciones, otorgándoles la posibilidad de efectuar intercambio de conocimientos y experiencias como también de obtener conocimientos teórico-prácticos u herramientas propias del ejercicio de la función, como futuros profesionales en Ciencias Geológicas.', 'Implementar Programas de Prácticas Pre Profesionales (PPP) Asistidas Supervisadas o de Verano y Escuelas Regionales de Campo específicas (ERC), con la finalidad de contribuir en la formación académica', 1, 24, 1, 43, 0, 0, 1, 0, '', 1, 0, ' ', ''),
('R227/22-CS', '', '', '2022-08-24', '2027-08-24', 'Prestarse recíproca asistencia y cooperación en todos aquellos aspectos que tengan relación directa con las actividades y fines propios de ambos organismos en las áreas de enseñanza, investigación, creación y extensión universitaria. ', 'Prestarse recíproca asistencia y cooperación en todos aquellos aspectos que tengan relación directa con las actividades y fines propios de ambos organismos en las áreas de enseñanza, investigación, cr', 15, 60, 1, 44, 0, 0, 1, 0, '', 1, 0, ' ', ''),
('R106/22', '', '', '2022-12-12', '2023-12-12', 'La Facultad se compromete a brindar servicios profesionales atinentes al Recurso Hídrico Subterraneo, conforme se detalla en cláusula tercera para brindar asesoramiento en la Mesa Permanente de Gestión Integrada del Agua.												', 'A) Planificación hidrológica, manejo integrado de cuencas y balances hídricos.\r\nRealizar balances hídricos de cada una de las cuencas provinciales.\r\nDiseñar acciones en el marco del manejo integrado d', 1, 12, 1, 45, 0, 0, 1, 900, 'En 3 pagos de $300.000', 1, 0, ' ', ''),
('R103/22-CD-FCEFN', '02-1706-2022', '', '2022-12-05', '2023-12-05', 'Acciones conjuntas rendientes a evaluar y generar dartos tecnicos cientificos en el Parque Provincial Presidente Sarmiento. \r\nEvaluar las variables bioticas (flora y fauna), abioticas (hidrologia, suelos, geomorfología, clima) y sociales (creciemiento de la poblacion de Zonda, aumento de la sup. cultivada, usos de los recursos) que influyen en la dinámica del área protegida. 												', '1. Identificar cambios en la superficie cultivada, superficie construida y densidad de la población en el Valle de Zonda.\r\n2. Identificar cambios en la cobertura y distribución de la vegetación y esti', 1, 12, 1, 46, 0, 0, 1, 0, '', 1, 0, ' ', ''),
('R50/22', '', '', '2022-12-05', '2024-12-05', 'Acciones conjuntas tendientes a capacitar al personal de la SEADYS, a organizaciones y/o personas que esta disponga en temas referidos a la interpretación del Patrimonio Geológico Natural en Áreas Naturales Protegidas de la Provincia de San Juan, como también asesorar en todo lo relativo a dicho patrimonio. ', 'Cursos: Vulnerabilidad del Recurso Hídrico Subterráneo en San Juan\r\nManejo y Conservación de suelos\r\nEcogeomorfología del área urbana-periurbana de San Juan\r\nMonitoreos ambientales\r\nLegislación ambien', 1, 24, 1, 47, 0, 0, 1, 0, '', 1, 0, ' ', ''),
('R12/22', '', '', '2022-12-05', '2023-12-05', 'Acciones conjuntas tendientes a desarrollar el relevamiento y propuesta de monitoreo de las comunidades de arbustos del Área Protegida Manantiales, Calingasta, San Juan. \r\nConocer las edades que tienen los individuos de las poblaciones de A. pinifolia. También se pretende conocer la variación hidroclimática en la actualidad y como esta ha sido durante los últimos 300 años en la cordillera de los Andes Centrales en el Área Protegida Manantiales. ', 'Acciones conjuntas tendientes a desarrollar el relevamiento y propuesta de monitoreo de las comunidades de arbustos del Área Protegida Manantiales, Calingasta, San Juan. \r\nConocer las edades que tiene', 1, 0, 0, 48, 0, 0, 1, 0, '', 1, 0, ' ', ''),
('R95/22', '', '', '2022-11-18', '2024-05-18', 'Otorgar capacitación al personal de la Fuerza de Policía de San Juan, brindando contenidos teóricos, prácticos y tecnológicos relativos a la colecta, fijación y conservación de muestras de entomofauna cadavérica.', '• Capacitar al Personal de la fuerza de Seguridad de la provincia de San Juan en el conocimiento y caracterización de la entomofauna cadavérica de ambientes áridos\r\n• Adquirir destreza en la toma de m', 1, 0, 0, 49, 0, 0, 1, 0, '', 1, 0, ' ', ''),
('107/24', '02-1181-2024', '', '2024-11-07', '2025-12-31', 'Acuerdo de condiciones del Servicio a Terceros, solicitado por Glencore Pachón, conducente a realizar la descripción petrográfica de cortes delgados provistos por la empresa.', 'Realizar la descripción petrográfica de 53 cortes delgados aportados por Glencore Pachón. Se describirán los minerales y textura con el fin de clasificar los tipos de roca.', 1, 12, 1, 50, 0, 0, 2, 3975, '', 1, 0, ' ', ''),
('131/24', '02-1365-24', '', '2024-11-07', '2026-11-07', 'Realización de estudios científicos, vinculados con el proceso de la segunda actualización del Ordenamiento Territorial de Bosques Nativos.', 'Participar en el proceso de la segunda actualización del Ordenamiento Territorial de Bosques Nativos, de la provincia de San Juan, mediante el asesoramiento técnico y la entrega de productos digitales', 1, 24, 1, 51, 0, 0, 1, 0, '', 1, 0, ' ', ''),
('127/24', '02-1655-24', '', '2024-11-20', '2025-11-20', 'Los intervinientes en este acta, realizaran acciones conjuntas y de colaboración mutua, conducentes a la recolección, registro, evaluación y conservación ex situs de la diversidad vegetal de zonas de vega y estepa, en el área de impacto del Proyecto Los Azules ubicado en el departamento de Calingasta. ', 'Estudiar, identificar y conservar en banco de germoplasma, la diversidad vegetal del área de influencia del Proyecto minero Los Azules, departamento Calingasta, San Juan. ', 1, 0, 0, 52, 0, 0, 2, 50000, 'El monto será transferido al Fondo Universitario de la U.N.S.J. en pesos argentinos', 1, 0, ' ', ''),
('120/2024-CD- FCEFN', '02-1155-2024', '', '2024-05-20', '2025-05-20', 'La FCEFyN, junto al  Municipio de Rivadavia, acuerdan prestarse mutua asistencia en el desarrollo de actividades relativas a sus respectivos fines y objetivos institucionales, relacionados con actividades de formación, científicas y culturales. ', 'La FCEFyN proporcionará al Municipio dos aulas para el dictado de cursos.                                               El municipio realizará obras de reparación en los edificios de la Facultad y/o e', 1, 12, 1, 53, 0, 0, 1, 0, '', 1, 0, ' ', ''),
('97/2022-CD-FCEFN', '02/1419/2022', '', '2022-11-07', '2023-11-07', 'Acciones conjuntas y de colaboración mutua conducentes a la recolección, registro, evaluación y conservación ex situ de la biodiversidad vegetal de zonas de vega y de estepa, en el área de impacto del Proyecto Josemaría, situado al noroeste del Departamento de Iglesia, Provincia de San Juan.', 'Servicio de conservación ex situ de biodiversidad vegetal de zonas de vegas y de estepa de altura provenientes del área de impacto del Proyecto JOSEMARÍA, Departamento Iglesia, Provincia de San Juan.', 1, 0, 0, 54, 0, 0, 2, 58240, '', 1, 0, ' ', ''),
('65/2022-CD-FCEFN', '02-967-2022', '', '2022-10-27', '2024-10-27', 'Formalizar actividades Científicas, Técnicas y de Extensión entre las Facultades en el marco del proyecto de extensión denominado \"Geoparque Cerro de Valdivia: Acciones estratégicas participativas para su desarrollo\".', 'Contribuir con La formación y desarrollo de capacidades de la comunidad del Cerro Valdivia, futuros co-gestores y administradores del Proyecto.', 1, 0, 1, 55, 0, 0, 1, 0, '', 1, 0, ' ', ''),
('R89/2021-CD-FCEFN', '02-1297-P-2021', '', '2022-09-27', '2122-09-27', 'Colaboración general mutua en los trabajos de \"Desarrollo del modelo de distribución de permafrost Nacional de Argentina y Provincial de San Juan, y sus aspectos hidrometeorológicos. ', '', 1, 0, 0, 56, 0, 0, 1, 0, '', 1, 0, ' ', ''),
('R154/2022-CS', '02-1052-S-2022', '', '2022-09-21', '2023-06-21', 'Establecer canales de colaboración y cooperación entre Las Partes para la implementación, en el ámbito de sus respectivas competencias, de acciones conjuntas y/ coordinadas en materia de formación e inserción laboral en el sector de la industria del conocimiento e industrias tradicionales en proceso de reconversión o transformación tecnológica y digital.', '', 12, 0, 0, 57, 0, 0, 1, 0, '', 1, 9691200, ' ', ''),
('R60/2022', '02-0931-S-22', '', '2022-09-01', '2023-09-01', 'Preparación de secciones delgadas y pulidas de 28 cortes de rocas que seran aportados por la EMPRESA\r\nRealizar la descripción geológica\r\nObtener fotomicrografías y fotografías', 'Estudio petro-calcográfico de 28 muestras de rocas provistas por la empresa. ', 2, 0, 0, 58, 0, 0, 1, 168000, '', 1, 0, ' ', ''),
('R61/2022-CD-FCEFN', '02-0932-S-22', '', '2022-09-01', '2023-09-01', 'Preparación de secciones delgadas y pulidas de 8 cortes de rocas que serán aportados por la EMPRESA\r\nRealizar la descripción geológica\r\nObtener fotomicrografías y fotografías', 'Estudio petro-calcográfico de 8 muestras de rocas provistas por la empresa. ', 1, 0, 0, 59, 0, 0, 1, 48000, '', 1, 0, ' ', ''),
('R043/22-CS', '02-0835-S-20', '', '2022-08-17', '2023-08-17', 'Acciones conjuntas a efectos de llevar a cabo prácticas profesionales situadas no rentadas, como parte de la capacitación de los estudiantes que cursan las asignaturas Optativa I y II \"Práctica Profesional Situada\" de las Carreras Lic. En Sistemas de Información y Cs de la Computación del Depto. de Informática de la FCEFN y así tomar contacto con la aplicación de tecnologías actualizadas, contribuyendo así a facilitar la etapa de transición entre lo educacional y lo laboral, acción que contribuirá a una formación integral de los mismos. 												', 'Acciones conjuntas a efectos de llevar a cabo prácticas profesionales situadas no rentadas, como parte de la capacitación de los estudiantes que cursan las asignaturas Optativa I y II \"Práctica Profes', 13, 0, 1, 60, 0, 0, 1, 0, '', 1, 0, ' ', ''),
('R88/2022-CD-FCEFN', '02-1345-2022', '', '2022-12-19', '2025-12-19', 'Renovar el Acta Complementaria celebrada entre las partes en fecha 22 de mayo de 2019 y modificar la\r\ncláusula OCTAVA de la misma.', 'Renovar el Acta Complementaria celebrada entre las partes en fecha 22 de mayo de 2019.', 8, 0, 1, 61, 0, 0, 1, 0, '', 1, 0, ' ', ''),
('R60/24-CS', '02-121-A-2022', '', '2022-10-14', '2023-10-14', 'Fijar pautas generales para la celebración de Préstamos de Uso (comodatos) particulares entre la Facultad y Deprominsa. \r\nSiempre en la medida que lo permitan sus necesidades operativas (las que tendrán siempre prioridad sobre los compromisos asumidos en la presente Acta Complemenaria), Deprominsa entregará periódicamente al I.M.C.N., perteneciente a la Facultad, a título de Préstamo de Uso (comodante), el Scanner 3D portátil inalámbrico marca ARTEC, modelo Leo, Nº de serie 4042643420 de propiedad de la primera. ', 'Fijar pautas generales para la celebración de Préstamos de Uso (comodatos) particulares entre la Facultad y Deprominsa.', 1, 12, 1, 62, 0, 0, 1, 0, '', 1, 0, ' ', ''),
('R49/2022-CD-FCEFN', '02-415-D-22', '', '2022-04-22', '2024-04-22', 'Promover las actividades, académicas, científicas, tecnológicas y culturales en favor de las investigaciones geológicas y arqueológicas de diversos espacios de la provincia', 'Promover las actividades, académicas, científicas, tecnológicas y culturales en favor de las investigaciones geológicas y arqueológicas de diversos espacios de la provincia', 7, 0, 1, 63, 0, 0, 1, 0, '', 1, 0, ' ', ''),
('R49/2021', '02-0987-I-21', '', '2022-05-27', '2024-05-27', '.', 'Implementar acciones conjuntas tendientes a:\r\nCapacitar para la interpretación del patrimonio geológico natural en Geoparque y\r\nareas naturales protegidas de la provincia de San Juan.\r\n Fomentar el em', 1, 0, 0, 64, 0, 0, 1, 0, '', 1, 0, ' ', ''),
('R04/2022-CD-FCEFN', '02-0156-S-22', '', '2022-05-26', '2023-05-26', '.', 'Iniciar formalmente el proyecto EU61-UNSJ15691\r\nCompetencias Digitales Chimbas', 1, 0, 0, 65, 0, 0, 1, 0, '', 1, 0, ' ', ''),
('R02/2022-CD-FCEFN', '02-0155-S-22', '', '2022-05-20', '2023-05-20', '.', 'Iniciar formalmente el proyecto EU61-UNSJ14438 - Competencias Digitales Pocito ', 1, 0, 0, 66, 0, 0, 1, 0, '', 1, 0, ' ', ''),
('R121/22-CD-FCEFN ', '02-2230-2022', '', '2023-06-05', '2027-06-05', 'Marco de colaboración en actividades de mutuo interés por su trascendencia social, cultural y educativa. \r\n', 'El COPROGEO y el Departamento de Geofísica y Astronomía de la FCEFN se comprometen a establecer un marco de colaboración en actividades de mutuo interes por su trascendencia social, cultural y educati', 1, 0, 1, 67, 0, 0, 1, 0, '', 1, 0, ' ', ''),
('R150/22-CS', '02-2064-2021', '', '2021-12-20', '2022-04-20', 'La UNSJ a través del departamento de informática de la FCEFN, se compromete a realizar tareas de investigación y desarrollo en conjunto con la empresa ', 'Realizar tareas de investigación y desarrollo, en conjunto con la empresa ', 11, 0, 0, 68, 0, 0, 1, 6210000, '', 1, 0, ' ', ''),
('R19/2022-CD-FCEFN', '02-508-S-22', '', '2022-05-02', '2023-05-02', 'Implementar en el ámbito de la UNSJ la Diplomatura en Extensión Universitaria en Prácticas Socioeducativas, contenidos formativos en el desarrollo de un trayecto curricular, de abordaje interdisciplinario y en trabajo conjunto con diferentes territorios. ', 'Implementar em el ámbito de la UNSJ la Diplomatura en Extensión Universitaria en Practicas Socioeducativas.', 3, 0, 0, 69, 0, 0, 1, 400000, 'Los montos destinados por cada unidad academica para la financiacion de la diplomatura son: \r\nEUCS: $200.000 (Pesos: doscientos mil con 00/100)\r\nFAUD: $200.000 (Pesos: doscientos mil con 00/100)', 1, 200, ' ', ''),
('R87/2021-CD-FCEFN', '02-1224-I-21', '', '2022-04-29', '2024-04-29', 'Promover actividades académicas, científicas, tecnológicas y culturales en favor de las investigaciones geológicas y arqueológicas de diversos espacios de la provincia de San Juan.\r\n', 'Promover actividades académicas, científicas, tecnológicas y culturales en favor de las investigaciones geológicas y arqueológicas de diversos espacios de la provincia de San Juan ', 7, 0, 1, 70, 0, 0, 1, 0, '', 1, 0, ' ', ''),
('R86/2021-CD-FCEFN', '02-1877-S-21', '', '2021-12-02', '2021-12-02', '(La presente acta complementaria se suscribe sin termino de duración, mientras las partes no manifiesten de forma expresa su voluntad de rescindirla.) ', 'Implementar acciones conjuntas tendientes a promover la capacitación del personal de servicio de seguridad de la provincia.', 1, 0, 0, 71, 0, 0, 1, 0, 'La secretaria se hará cargo del costo de los cursos y capacitaciones acordadas en cada anexo, debiendo abonar cincuenta (50%) por ciento al inicio de cada curso uy el cincuenta (50%) por ciento restante al finalizar el mismo ', 1, 0, ' ', ''),
('00', '01-0924-D-2022', '', '2021-12-21', '2023-12-21', 'La Facultad a través del Depto. de Geología proveerá el personal docente responsable del dictado de la totalidad de las materias. Las Cámara se compromete a financiar y poner a disposición de la UNSJ los fondos relativos al curso de infreso y dictado de la Tecnicatura Universitaria en Exploración Geológica, traslado de docentes y personal administrativo. El municipio se compromete a proporcionar alojamiento y comida para el personal. y las instalaciones para el dictado de clases. ', 'Llevar a cabo el dictado de la carrera \"Tecnicatura Universitaria en Exploración Geológica \" en el Departamento Calingasta ', 1, 0, 0, 72, 0, 0, 1, 216000, '', 1, 0, ' ', ''),
('36/2022-CS', '01-2150-D-21  // 01-0212-S22', '', '2021-08-18', '2022-08-18', 'Cooperación entre la Universidad y la Fundación, para desarrollar el dictado de dos cursos de formación docente sobre didáctica de la programación.\r\n												', 'Desarrollar el dictado de dos cursos de formación docente sobre didáctica de la programación en la Provincia de San Juan.											    ', 11, 0, 0, 73, 0, 0, 1, 1300210, '$1.300.212,78\r\nLa forma de pago será la siguiente: \r\nPago Inicial: 30%, es decir la suma total de $390.063,80\r\n2do Pago: 30% es decir la suma total de $390.063,80\r\n3er Pago 40% es decir la suma de $520.086,00\r\n', 1, 0, ' ', ''),
('36/2022-CS', '01-2150-D-21  // 01-0212-S22', '', '2021-08-18', '2021-08-18', 'El trabajo con los alumnos de las escuelas secundaria consistirá en el dictado de un curso básico de programación utilizando la herramienta app inventor y finalizará con un charla en la que se explica que significa estudiar y trabajar en el sector tecnológico.', 'Desarrollo de actividades en escuelas secundarias, dirigidas a incentivar carreras TIC, por parte de la Universidad.', 11, 0, 0, 74, 0, 0, 1, 435467, 'La forma de pago será la siguiente: \r\nPago Inicial: 30%, es decir la suma total de $130.640,10\r\n2do Pago: 30% es decir la suma total de $130.640,10\r\n3er Pago 40% es decir la suma de $174.186,80', 1, 0, ' ', ''),
('R27/21-CS', '02-0810-A-20', '', '2021-04-30', '2023-04-30', 'Acciones conjuntas para evaluar la presencia de cóndores Andinos en el área de manejo de residuos solidos urbanos del Parque de Teconologías Ambientales de San Juan y generar medidas orientadas a evitar su presencia en el sitio asegurando prácticas de manejo.', 'Evaluar la presencia de cóndores Andinos en el área de manejo de residuos solidos urbanos del Parque de Tecnologías Ambientales de San Juan. \r\nGenerar medidas orientadas a evitar su presencia en el si', 10, 0, 0, 75, 0, 0, 1, 0, '', 1, 0, ' ', ''),
('R123/21-CS', '02-0254-S-21', '', '2021-04-28', '2021-06-30', 'Detección, delimitación y determinación de morfoestructuras con actividad tectónica cuaternaria. \r\nAnálisis de la amenaza sísmica.\r\nElaboración y entrega de un informe Neotectónico preliminar a los 30 días de firmada la presente Acta.', 'Realizar el análisis Neotectónico y de amenaza sísmica en el área del Proyecto Pachón, situado en el Departamento de Calingasta.', 14, 0, 0, 76, 0, 0, 2, 10000, '', 1, 0, ' ', ''),
('R147/19-CS-FCEFN', '02-2220-S-19', '', '2020-04-28', '2025-04-28', 'Acciones conjuntas tendientes a fortalecer áreas técnicas del Observatorio Ambiental, creado por Ley 1800-L de la Cámara de Diputados de San Juan en el año 2016.', 'Acciones conjuntas tendientes a fortalecer áreas técnicas del Observatorio Ambiental, creado por Ley 1800-L de la Cámara de Diputados de San Juan en el año 2016.', 1, 0, 0, 77, 0, 0, 1, 0, '', 1, 0, ' ', ''),
('R118/22-CD-FCEFN', '02-2276-2022', '', '2024-12-09', '2024-12-09', '\r\nLa Facultad de Ciencias Exactas, Físicas y Naturales de la UNSJ expresa la necesidad de capacitar a los docentes y estudiantes de asignaturas de las carreras Lic. en Física, en Astronomía y en Geofísica de la facultad, a través de actividades específicas de colaboración como: formación de recursos humanos, generar líneas de investigación, asesoramiento en modernización de laboratorios. Por otra parte, los docentes-investigadores del Centro de Investigaciones Ópticas (CIOp) que cuentan con la experiencia disciplinar necesaria en temas de Óptica y Fotónica tienen la predisposición para colaborar en dichas actividades.', 'Generar vínculos y fijar las condiciones bajo las cuales se establecerán las relaciones de colaboración académico-científica entre las partes. \r\nPor parte de los docentes-investigadores del ClOp, cons', 17, 0, 0, 78, 0, 0, 1, 0, '', 1, 0, ' ', ''),
('R008/21-CS', '02-0289-S-20', '', '2020-01-01', '2020-12-31', '.', 'Desarrollar el dictado de un curso de formación docente sobre didáctica de la programación en la Provincia de San Juan', 9, 0, 0, 79, 0, 0, 1, 313.306, '(pago inicial de $93.992, un pago del 30% del total: $93.992 y un pago del 40% restante: $125.322 al finalizar)', 1, 0, ' ', ''),
('R1165/2019-CD-FCEFN', '02-1912-D-19', '', '2019-11-08', '2020-01-08', 'Implementar Practicas Profesionales Asistidas con la finalidad de contribuir en la formación académica y capacitación de alumnos de grado, otorgándoles la posibilidad de obtener conocimientos, prácticas y herramientas propias del ejercicio de la función como profesional geólogo. ', 'Implementar Practicas Profesionales Asistidas con la finalidad de contribuir en la formación académica y capacitación de alumnos de grado, otorgándoles la posibilidad de obtener conocimientos, práctic', 2, 12, 0, 80, 0, 0, 1, 216000, 'Del que corresponden como contribución económica para cada uno de los practicantes un monto de $ 1800,00 por día.', 1, 0, ' ', ''),
('-', '02-1039-2021', '', '2023-08-03', '2023-10-03', 'Acciones conjuntas y de colaboración mutua, conducente a realizar el estudio petrográfico macroscópico y microscópico de 7 muestras de rocas pertenecientes al proyecto Vanesa, situado en el Depto. de Calingasta, aportados por la empresa. Este estudio se llevara a cabo en el ámbito del Departamento de Geología de la FCEFN ', 'Acciones conjuntas y de colaboración mutua, conducentes a realizar un Estudio petrográfico macroscópico y microscópico de muestras de rocas pertenecientes al proyecto Vanesa, situado en el Depto. de C', 1, 0, 0, 81, 0, 0, 1, 49000, '', 1, 0, ' ', ''),
('R117/2019-CD-FCEFN', '02-1443-S-19', '', '2019-10-21', '2019-12-21', 'Entre la empresa y la Facultad se llevaran a cabo acciones conjuntas y de colaboración mutua, conducentes a realizar un Estudio petrográfico macroscópico y microscópico de muestras de 24 rocas pertenecientes al proyecto Rio Salinas, situado en el Departamento de\r\nCalingasta, Provincia de San Juan.', 'Acciones conjuntas y de colaboración mutua, conducentes a realizar un Estudio petrográfico macroscópico y microscópico de muestras de rocas pertenecientes al proyecto Río Salinas, situado en el Depto.', 1, 0, 0, 82, 0, 0, 1, 86400, '', 1, 0, ' ', ''),
('R110/2019-CD-FCEFN', '02-1809-S-19', '', '2019-09-27', '2020-09-27', 'Actualización del Nivel 1 del Inventario Provincial de Glaciares, cuenca del Río San Juan con las imágenes Spot capturadas en 2018 y consensuar con el Gobierno de la Prov. De San Juan los mecanismos y presupuestos necesarios para la compra, instalación, mantenimiento y captura de datos de detalle en glaciares seleccionados, en un período de 5 años para la ejecución de los Niveles Jerárquicos 2 y 3.', 'Actualizar el Inventario Provincial de Glaciares a partir del procesamiento de imágenes satelitales de alta resolución espacial actuales (2018).\r\n.Lograr la validación de mayor cantidad de geoformas i', 1, 0, 0, 83, 0, 0, 1, 4660000, 'La forma de pago será la siguiente:  a la firma del acta acuerdo un pago de $3.075.600 (Pesos argentinos: tres millones setenta y cinco mil seiscientos) correspondiente al 66% del presupuesto, destinados a soportar las actividades de terreno y procesamiento de información; un pago de $792.200 (pesos argentinos: setecientos noventa y dos mil doscientos) a fines de abril, coincidentes con el fin de las actividades de campaña y contra entrega de informe final un pago $792.200 (pesos argentinos: setecientos noventa y dos mil doscientos) correspondiente al 34% restante de la propuesta económica.', 1, 0, ' ', ''),
('R10/2018-CD-FCEFN', '02-2978-S-17', '', '2019-09-10', '2022-09-10', 'A través del Centro de Rehabilitación de Fauna Silvestre, Educación Ambiental y Recreación Responsable del Departamento de Rivadavia, el Faunístico, se realizarán acciones conjuntas a fin de concretar: \r\nLíneas de investigación, conservación y manejo de fauna silvestre y flora del Faunístico\r\nActividades vinculadas con la gestión y educación ambiental\r\nActividades para el desarrollo productivo en animales domésticos y sus derivados.\r\nProyectos con animales de Bioterio e Insectario\r\nVoluntariados												', 'A través del Centro de Rehabilitación de Fauna Silvestre, Educación Ambiental y Recreación Responsable del Departamento de Rivadavia, el Faunístico, se realizarán acciones conjuntas a fin de concretar', 1, 0, 0, 84, 0, 0, 1, 0, '', 1, 0, ' ', ''),
('R86/2019', '02-1698-S-19', '', '2019-08-27', '2020-08-27', 'La UNSJ se compromete a través del Instituto y Museo de Ciencias Naturales (IMCN), de la FCEFN, a realizar campañas de exploración paleontológicas en el ámbito de la Provincia de San Juan.\r\nLa UNSJ dispondrá de personal altamente capacitado, para dar cumplimento al acta, realizando una campaña exploratoria anual. ', 'Realización de campañas de exploración paleontológica ', 1, 0, 0, 85, 0, 0, 1, 400000, '', 1, 0, ' ', ''),
('R69/2019-CD-FCEFN', '02-1402-S-19', '', '2019-08-07', '2021-02-07', 'La SECITI  otorgará un subsidio para financiar la contraparte del monto aportado por la SPU para las actividades de investigación, desarrollo e innovación. Desarrollo de aplicación móvil para ser utilizada por el Ministerio', 'La UNSJ, a través de la FCEFN, se compromete a desarrollar la aplicación móvil aportando recursos humanos y financiando costos de infraestructura operativa. ', 1, 0, 0, 86, 0, 0, 1, 23000, '', 1, 0, ' ', ''),
('R50/2019-CD-FCEFN', '02-0750-S-19', '', '2019-05-30', '2021-05-30', 'Acciones conjuntas tendientes a fortalecer la preservación del patrimonio herpetológico inserto en la Colección Científica y Didáctica de Vertebrados (CCDV) del Departamento de Biología', 'Acciones conjuntas tendientes a fortalecer la preservación del patrimonio herpetológico inserto en la Colección Científica y Didáctica de Vertebrados (CCDV) del Departamento de Biología', 1, 0, 0, 87, 0, 0, 1, 0, '', 1, 0, ' ', ''),
('R51/2019-CD-FCEFN', '02-0860-S-19', '', '2019-05-29', '2020-05-29', 'Acciones conjuntas a fin de poner en funcionamiento la obra realizada \"Centro de Interpretación y Observación\" construido en el predio del OAFA diseñada con el propósito de potenciar la actividad turística astronómica.', 'Acciones conjuntas a fin de poner en funcionamiento la obra realizada \"Centro de Interpretación y Observación\" construido en el predio del OAFA diseñada con el propósito de potenciar la actividad turí', 1, 0, 0, 88, 0, 0, 1, 0, '', 1, 0, ' ', ''),
('R605/2019-CD-FCEFN // R49/2019-CD-FCEFN', '02-1885-S-18', '', '2019-05-22', '2022-05-22', 'Acciones conjuntas para llevar a cabo tareas y proyectos que tengan que ver con el control vectorial de especies de importancia sanitaria.\r\n', 'Acciones conjuntas para llevar a cabo tareas y proyectos que tengan que ver con el control vectorial de especies de importancia sanitaria.\r\n', 1, 0, 0, 89, 0, 0, 1, 0, '', 1, 0, ' ', ''),
('R74/2018-CD-FCEFN', '02-1273-S-18', '', '2019-04-30', '2019-10-30', 'Realización del Workshop \"Towards future research on space weather drivers. FRESWED\"', 'Realización del Workshop \"Towards future research on space weather drivers. FRESWED\"', 1, 0, 0, 90, 0, 0, 1, 148043, '', 1, 0, ' ', ''),
('R25/2019-CD-FCEFN', '02-0340-S-19', '', '2019-04-04', '2024-04-04', 'Acciones conjuntas tendientes a cumplir y efectivizar objetivos señalados en la Ley Nº 1800-L (Observatorio Ambiental)', 'Acciones conjuntas tendientes a cumplir y efectivizar objetivos señalados en la Ley Nº 1800-L (Observatorio Ambiental)', 1, 0, 0, 91, 0, 0, 1, 0, '', 1, 0, ' ', ''),
('R25/2019-CD-FCEFN', '02-340-S-19', '', '2019-04-30', '2019-07-02', 'Acciones conjuntas para concretar producciones audiovisuales a efectos de explicar el Eclipse Total\r\nCreación de aplicación para dispositivos móviles para encontrar fácilmente la zona más cercana para apreciar el eclipse en su fase total y la duración aproximada de éste fenómeno. 												', 'Acciones conjuntas para concretar producciones audiovisuales a efectos de explicar el Eclipse Total											    ', 1, 0, 0, 92, 0, 0, 1, 60000, '', 1, 0, ' ', ''),
('R22/2019-CD-FCEFN', '02-0194-S-19', '', '2019-04-04', '2024-04-04', 'Acciones conjuntas tendientes a cumplir y efectivizar objetivos señalados en la Ley Nº 1800-L (Observatorio Ambiental)', 'Acciones conjuntas tendientes a cumplir y efectivizar objetivos señalados en la Ley Nº 1800-L (Observatorio Ambiental)', 1, 0, 0, 93, 0, 0, 1, 420000, '', 1, 0, ' ', ''),
('R24/2019-CD-FCEFN', '02-0196-S-19', '', '2019-04-04', '2024-04-04', 'Acciones conjuntas conducentes a facilitar las tareas de campo a realizar por tesistas de grado y posgrado de las distintas carreras de la Casa de Estudios.', 'Acciones conjuntas conducentes a facilitar las tareas de campo a realizar por tesistas de grado y posgrado de las distintas carreras de la Casa de Estudios.', 1, 0, 0, 94, 0, 0, 1, 0, '', 1, 0, ' ', '');
INSERT INTO `actividad` (`NroResolucion`, `NroExpediente`, `NroConvenioMarco`, `Fecha_inicio`, `Fecha_final`, `Resumen`, `Objetivo`, `TipoActividad_Id`, `PlazoRenovacion`, `RenovacionAutomatica`, `Id`, `UbicacionArchivo_Id`, `Informe_Id`, `MonedaOrganizacion_Id`, `InversionOrganizacion`, `NotaInversionOrganizacion`, `MonedaUnidad_Id`, `InversionUnidad`, `NotaInversionUnidad`, `NroResolucion_Asociada`) VALUES
('R23/2019-CD-FCEFN', '02-0195-S-19', '', '2019-04-04', '2020-04-04', 'Acciones conjuntas tendientes a llevar a cabo un Plan de Monitoreo Biológico, Físico y Químico del Dique Punta Negra.\r\nEstablecer una línea de base biológica y fisico-química del Dique Punta Negra, para definir parámetros a monitorear que generen la información necesaria para planificar y ejecutar políticas ambientales respecto a este sistema.\r\nPropiciar el diseño y ejecución de un plan de Educación Ambiental respecto a estas políticas ambientales.												', 'Determinar y monitorear:\r\nPropiedades físico-químicas del agua\r\nComposición y abundancia del fitoplancton y zooplancton\r\nComposición y abundancia de peces\r\nEstructura de la comunidade de macroinverteb', 1, 0, 0, 95, 0, 0, 1, 301136, '', 1, 0, ' ', ''),
('R05/2019-CD-FCEFN', '02-0118-S-19', '', '2019-03-18', '2022-03-18', 'Tareas conjuntas destinadas a fortalecer la formación y capacitación de los alumnos del Departamento de Biología de la Facultad mediante diversas acciones y actividades												', '1. Introducir al estudiante en las diferentes aplicaciones de esta Ciencia en Biología. \r\n2. Aplicar los conocimientos teóricos enel reconocimiento de estructuras y procesos.\r\n3. Distinguir y fundamen', 1, 0, 0, 96, 0, 0, 1, 0, '', 1, 0, ' ', ''),
('R06/2019-CD-FCEFN', '02-2681-S-18', '', '2019-03-13', '2019-09-13', 'Se ejecutaran acciones conjuntas, para concretar la edición e impresión de 1000 ejemplares de un material bibliográfico a titularse \"Observando el Cielo desde San Juan\"												', 'Aplicar los conocimientos teóricos en el reconocimiento de estructuras y procesos											    ', 1, 0, 0, 97, 0, 0, 1, 145000, '', 1, 0, ' ', ''),
('R03/2019-CD-FCEFN', '02-0001-S-19', '', '2019-02-18', '2019-08-18', 'Edición e impresión de 2000 ejemplares de un material bibliográfico a titularse \"¿Por qué suceden los sismos en San Juan? Conceptos básicos y consejos de prevención												', 'Edición e impresión de 2000 ejemplares de un material bibliográfico a titularse \"¿Por qué suceden los sismos en San Juan? Conceptos básicos y consejos de prevención											    ', 1, 0, 0, 98, 0, 0, 1, 290000, '', 1, 0, ' ', ''),
('R04/2019-CD-FCEFN', '02-0080-S-19', '', '2019-02-18', '2019-06-18', 'Tareas conjuntas para concretar una capacitación destinada a personal de la Policía de San Juan y relacionada a las técnicas y cuidados a tener en cuenta ante hallazgos de cadáveres o restos humanos', 'Distinguir y fundamentar el uso de distintas técnicas en el reconocimiento de estructuras y sustancias, y sus aplicaciones prácticas.', 1, 0, 0, 99, 0, 0, 1, 0, '', 1, 0, ' ', ''),
('R132/2018-CD-FCEFN', '02-2024-S-18', '', '2018-12-28', '2020-06-28', 'Acciones conjuntas a efectos de concretar estudios geolgógicos-ambientales en zonas de Angaco, enmarcados en el Proyecto de Investigación \"Estudio del subsitema natural como herramienta de ordenamiento ambiental territorial. Caso de estudio: áreas urbanas y periurbanas de los departamentos de San Martín y Angaco\", aprobado por Res. 21/18 del CS de la UNSJ', 'Acciones conjuntas a efectos de concretar estudios geolgógicos-ambientales en zonas de Angaco, enmarcados en el Proyecto de Investigación \"Estudio del subsitema natural como herramienta de ordenamient', 1, 0, 0, 100, 0, 0, 1, 0, '', 1, 0, ' ', ''),
('R133/2018-CD-FCEFN', '02-2606-S-18', '', '2018-12-17', '2019-06-17', 'Actividades conjuntas conducentes a la realización de tareas de campo y laboratorio en el Programa de control y monitoreo de la \"Polilla de la Vid\" (Lobesia botrana)', 'Armado de trampas captura\r\nColocación de trampas de control semanal en estaciones de trampeo\r\nRecolección de trampas\r\nIdentificación y conteo de ejemplares capturados\r\nCarga y tabulación de datos', 1, 0, 0, 101, 0, 0, 1, 0, '', 1, 0, ' ', ''),
('R131/2018-CD-FCEFN', '02-2233-S-18', '', '2018-12-17', '2021-12-17', 'Tareas conjuntas de investigación y capacitación, tendientes a fortalecer los estudios biológicos que conlleven al beneficio y mejoramiento de la actividad productiva de San Juan (Mosca de los Frutos).\r\nDectectar y caracterizar Cepas de Wolbachia en poblaciones nativas de mosca de los frutos de importancia económica en Argentina y evaluar sus posibles susos en programas de control (proyecto para carrera de Investigador Científico Conicet (CIC).\r\nEstablecer líneas de C. capitata y A. fraterculus portadoras de Wolbachia que puedan ser criadas masivamente y utilizadas en el marco de la técnica del insecto estéril en los distintos programas de control de estas plagas. ', '1. Detectar cepas de Wolbachia en poblaciones nativas de C. capitata de la provincia de San Juan y de A. fraterculus y C. capitata del noroeste argentino. \r\n2. Establecer crías de laboratorio con pobl', 1, 0, 0, 102, 0, 0, 1, 0, '', 1, 0, ' ', ''),
('R101/201-CD-FCEFN', '02-1358-S-18', '', '2018-12-05', '2019-07-02', 'Acciones conjuntas para concretar actividades, en el ambito del Sistema Educativo, que tengan que ver con la difusión del Eclipse Total a producirse el 02 de Julio de 2019												', 'Acciones conjuntas para concretar actividades, en el ambito del Sistema Educativo, que tengan que ver con la difusión del Eclipse Total a producirse el 02 de Julio de 2019											    ', 1, 0, 0, 103, 0, 0, 1, 0, '', 1, 0, ' ', ''),
('R115/2018-CD-FCEFN', '02-1779-S-18', '', '2018-12-01', '2019-12-01', 'Prácticas profesionales situadas no rentadas, como parte de la capacitación de los estudiantes que cursan la asignatura Optativa  I \"Práctica Profesional Situada\" de LSI y LCC, y así tomar contacto con la aplicación de tecnologías actualizadas, contribuyendo así a facilitar la etapa de transición entre lo educacional y lo laboral, acción que contribuirá a una formación integral de los mismos.', 'Prácticas profesionales situadas no rentadas, como parte de la capacitación de los estudiantes que cursan la asignatura Optativa  I \"Práctica Profesional Situada\" de LSI y LCC, y así tomar contacto co', 1, 0, 0, 104, 0, 0, 1, 0, '', 1, 0, ' ', ''),
('R128/2017-CD-FCEFN', '02-2225-S-17', '', '2018-11-26', '2020-11-26', 'Acciones conjuntas tendientes a la concreción del Proyecto de creación\"Geoparque CERRO VALDIVIA\" en el Departamento Pocito', 'Acciones conjuntas tendientes a la concreción del Proyecto de creación\"Geoparque CERRO VALDIVIA\" en el Departamento Pocito', 1, 0, 0, 105, 0, 0, 1, 0, '', 1, 0, ' ', ''),
('R71/2018-CD-FCEFN', '02-1271-S-18', '', '2018-11-26', '2019-05-26', 'Acciones conjuntas para la implementación del Proyecto \"Señalética turística para sitios de interés geológico de la ruta interlagos, depto Zonda - Ullúm\"\r\nContribuir con datos e información geológica actualizada para el diseño y la confección de paneles informativos (cartelería), donde se expliquen en lenguaje accesible para todo público las características relevantes del paisaje y los aspectos de la evolución geológica de cada SIG. \r\nAmpliar el circuito turístico tradicional, promover el turismo geológico y la conservación del patrimonio geológico de los departamentos de Zonda y Ullúm y de la provincia de San Juan.\r\nExtender el conocimiento científico al público general y divulgar las actividades del Gabinete de Mineralogía y Petrología de la FCEFN-UNSJ fuera del ámbito estrictamente académico. ', 'Acciones conjuntas para la implementación del Proyecto \"Señalética turística para sitios de interés geológico de la ruta interlagos, depto. Zonda - Ullúm\"\r\nContribuir con datos e información geológica', 1, 0, 0, 106, 0, 0, 1, 0, '', 1, 0, ' ', ''),
('R75/2018-CD-FCEFN', '02-1268-S-18', '', '2018-11-26', '2019-04-26', 'Acciones conjuntas para edición e impresión de 1000 ejemplares de un material bibliográfico: \"Biodiversidad de un desierto hiperárido: el Parque Provincial Ischigualasto, San Juan, Argentina\"												', 'Acciones conjuntas para edición e impresión de 1000 ejemplares de un material bibliográfico: \"Biodiversidad de un desierto hiperárido: el Parque Provincial Ischigualasto, San Juan, Argentina\"									', 1, 0, 0, 107, 0, 0, 1, 140000, '', 1, 0, ' ', ''),
('R70/2018-CD-FCEFN', '02-1265-S-18', '', '2018-11-26', '2019-07-02', 'Acciones conjuntas para concretar actividades que tengan que ver con la difusión del Eclipse Total a producirse el 02 de Julio de 2019, en un todo de acuerdo a la política de estado provincial denlo que respecta al eje Turismo Astronómico.', 'Acciones conjuntas para concretar actividades que tengan que ver con la difusión del Eclipse Total a producirse el 02 de Julio de 2019, en un todo de acuerdo a la política de estado provincial en lo q', 1, 0, 0, 108, 0, 0, 1, 0, '', 1, 0, ' ', ''),
('R130/2018-CD-FCEFN', '02-2227-S-18', '', '2018-11-05', '2019-11-05', 'Acciones conjuntas tendientes a realizar la elaboración del software denominado \"Sistema de Información para Monitoreo Ambiental Minero\". El principal objetivo radica en contribuir mediante el uso de las Tecnologías de la Información y las Comunicaciones (TICs), la integración de la información de los parámetros ambientales de los distintos proyectos mineros en la provincia de San Juan, sobre la base de las Componentes Ambientales a saber: Agua, Efluentes, Aire, Emisiones, Suelos y Sedimentos, Flora y Fauna, Limnología, Ruido, Vibraciones, Meteorología, Arqueología, Glaciología, Socio Económico y otros. ', 'Acciones conjuntas tendientes a realizar la elaboración del software denominado \"Sistema de Información para Monitoreo Ambiental Minero\". El principal objetivo radica en contribuir mediante el uso de ', 1, 0, 0, 109, 0, 0, 1, 0, '', 1, 0, ' ', ''),
('R129/2017-CD-FCEFN', '02-2061-S-17', '', '2018-09-04', '2023-09-04', 'Instalar y operar en las Estación de altura \"Carlos Cesco\" dependiente del OAFA de la UNSJ dos equipamientos para observaciones solares en 30 THz acoplado al telescopio HASTA de OAFA y en 17 THz. Denominado HATS a operar simultáneamente.', 'Instalar y operar en las Estación de altura \"Carlos Cesco\" dependiente del OAFA de la UNSJ dos equipamientos para observaciones solares en 30 THz acoplado al telescopio HASTA de OAFA y en 17 THz. Deno', 1, 0, 1, 110, 0, 0, 1, 0, '', 1, 0, ' ', ''),
('R73/2018-CD-FCEFN', '02-1142-S-18', '', '2018-08-07', '2018-11-07', 'El Consejo reconoce las tareas de Monitoreo del Inventario Provincial de Glaciares, que se desarrollan desde enero de 2018 por parte de la Universidad.', 'El Consejo reconoce las tareas de Monitoreo del Inventario Provincial de Glaciares, que se desarrollan desde enero de 2018 por parte de la Universidad.', 1, 0, 0, 111, 0, 0, 1, 558000, '', 1, 0, ' ', ''),
('R78/22-CS', '02-2605-S-18', '', '2018-06-01', '2118-06-01', 'Implementar, según se estime conveniente, acciones tendientes a desarrollar en forma conjunta, proyectos de carácter académico, centífico, tecnológico, social y cultural, para beneficio de ambas instituciones', 'Implementar, según se estime conveniente, acciones tendientes a desarrollar en forma conjunta, proyectos de carácter académico, centífico, tecnológico, social y cultural, para beneficio de ambas insti', 15, 0, 0, 112, 0, 0, 1, 0, '', 1, 0, ' ', ''),
('R/77/2018-CD-FCEFN', '02-1001-S-18', '', '2018-05-16', '2018-11-16', 'A través del Instituto de Informática, desarrollo de capacitación en tecnologías de desarrollo y mantenimiento de software, en el ámbito de la Corte.', 'A través del Instituto de Informática, desarrollo de capacitación en tecnologías de desarrollo y mantenimiento de software, en el ámbito de la Corte.', 1, 0, 0, 113, 0, 0, 1, 430000, '', 1, 0, ' ', ''),
('R38/2018-CD-FCEFN', '02-0587-S-18', '', '2018-04-10', '2018-10-10', 'Acciones conjuntas tendientes a la formación y/o perfeccionamiento de Recursos Humanos en lo que compete a la preservación y monitoreo de fauna silvestre con potencial riesgo de extinción.', 'Acciones conjuntas tendientes a la formación y/o perfeccionamiento de Recursos Humanos en lo que compete a la preservación y monitoreo de fauna silvestre con potencial riesgo de extinción.', 1, 0, 0, 114, 0, 0, 1, 30000, '', 1, 0, ' ', ''),
('R143/2017-CD-FCEFN', '02-2219-S-17', '', '2017-11-23', '2018-11-23', 'Acciones conjuntas tendientes a llevar a cabo un Plan de Monitoreo Biológico, Físico y Químico del Dique Punta Negra.\r\nEstablecer una línea de base biológica y fisico-química del Dique Punta Negra, para definir parámetros a monitorear que generen la información necesaria para planificar y ejecutar políticas ambientales respecto a este sistema.\r\nPropiciar el diseño y ejecución de un plan de Educación Ambiental respecto a estas políticas ambientales.												', 'Determinar y monitorear:\r\nPropiedades físico-químicas del agua\r\nComposición y abundancia del fitoplancton y zooplancton\r\nComposición y abundancia de peces\r\nEstructura de la comunidades de macroinverte', 1, 0, 0, 115, 0, 0, 1, 406820, '', 1, 0, ' ', ''),
('R142/2017-CD-FCEFN', '02-2078-D-17', '', '2017-11-01', '2018-01-05', 'Desarrollo de Software destinado a la adquisición y gestión de la información recabada por el Sistema Automático de Monitoreo de calidad de agua de río, mediciones in situ de parámetros ambientales realizados con instrumental de la SEADYS y resultados de análisis de muestras de aguas tomadas, en total acuerdo con el documento \"Sistema de Monitoreo automático de calidad de agua de río - Especificación de desarrollo de software\" emitido por la Sec. ', 'Implementar un software para realizar gráficas de los parámetros ambientales y realizar la incorporación de información enviadas desde estaciones remotas de monitoreo ubicadas en los distintos ríos de', 1, 0, 0, 116, 0, 0, 1, 39200, '', 1, 0, ' ', ''),
('R86/2017-CD-FCEFN', '02-1741-S-17', '', '2017-09-10', '2018-09-10', 'Aporte financiero de ambas partes para puesta en funcionamiento del \"Vivero de Especies Nativas\" en la Facultad. \r\nContribuir al desarrollo de actividades de reforestación, revegetación y recuperación de áreas degradadas de zonas áridas con especies nativas en San Juan.', '1. Generar un espacio para el desarrollo de actividades docentes, de investigación y técnicas con especies vegetales nativas. \r\n2. Brindar las condiciones necesarias para el desarrollo de investigacio', 1, 0, 0, 117, 0, 0, 1, 388356, '', 1, 354995, ' ', ''),
('R29/2017-CD-FCEFN', '02-0977-S-17 ', '', '2017-07-25', '2018-07-25', 'Acciones conjuntas tendientes a difundir resultados científicos, producidos por docentes-investigadores del Departamento de Biología de la FCEFN, de interés para el conjunto de la sociedad sanjuanina. ', ' Edición e impresión de dos libros \"Reptiles de San Juan. Una guía de campo\" y \"Artrópodos de importancia médico-sanitaria en San Juan. Arañas, Escorpiones y Mosquitos\"', 1, 0, 0, 118, 0, 0, 1, 177000, '', 1, 0, ' ', ''),
('R69/2017-CD-FCEFN', '02-1316-S-17', '', '2017-06-22', '2017-12-22', 'Tareas conducentes a investigar la interacción producida entre palomas urbanas, triatómidos (vinchucas) y la enfermedad de Tripanosomiasis Americana, endémica en la provincia (Mal de Chagas), aplicando además una metodología tendiente a disminuir las poblaciones de palomas en el ambiente urbano de la Ciudad Capital de San Juan', 'Tareas conducentes a investigar la interacción producida entre palomas urbanas, triatómidos (vinchucas) y la enfermedad de Tripanosomiasis Americana, endémica en la provincia (Mal de Chagas), aplicand', 1, 0, 0, 119, 0, 0, 1, 250000, '', 1, 0, ' ', ''),
('R67/2017-CD-FCEFN', '02-1247-S', '', '2017-05-17', '2018-05-17', 'Acciones conjuntas tendientes a publicar el libro \"Atlas de minerales de mena de la provincia de San Juan\", producido por docentes-investigadores del Departamento de Geología de la Universidad, de interés para el conjunto de la sociedad sanjuanina. Edición de 1000 (mil) libros.  ', 'Edición de 1000 (mil) libros. ', 1, 0, 0, 120, 0, 0, 1, 110000, '', 1, 0, ' ', ''),
('R27/2017-CD-FCEFN', '02-0990-S-18', '', '2017-05-08', '2017-09-08', 'Realización de un Mapa Minero de la Provincia de San Juan, a efectos de obtener una cartografía de base que refleje los conocimientos actualizados y focalizados en los aspectos relacionados con la economía de las manifestaciones minerales y el potencial exploratorio de los sectores geológicamente favorables del territorio provincial. ', '1. Realizar una recopilación de datos históricos referidos a las manifestaciones minerales de la Provincia.\r\n2. Incluir toda la información referente a las minas en operación, a los proyectos en las d', 1, 0, 0, 121, 0, 0, 1, 384160, '', 1, 0, ' ', ''),
('R21/2017-CD-FCEFN', '02-0334-S-17', '', '2017-03-15', '2017-07-15', 'Participación en la edición del libro \"San Juan Ambiental\", pensado y concebido como un aporte desde el ámbito académico hacia el medio educativo, administrativo, político y a la sociedad en general. ', 'Participación en la edición del libro \"San Juan Ambiental\", pensado y concebido como un aporte desde el ámbito académico hacia el medio educativo, administrativo, político y a la sociedad en general. ', 1, 0, 0, 122, 0, 0, 1, 70000, '', 1, 0, ' ', ''),
('R22/2017-CD-FCEFN', '02-0391-S-17', '', '2017-03-02', '2019-03-02', 'Acciones conjuntas a fin de concretar y llevar a cabo líneas de investigación prioritarias en el ámbito de la Reserva de San Guillermo (RBSG), en un todo de acuerdo al Plan de Gestión de la RBSG.												', 'Realizar relevamiento del ensamble de aves presentes en la Reserva.\r\nElaborar un listado de especies actualizado y mapas de distribución.\r\nDeterminar la abundancia de las especies de aves presentes y ', 1, 0, 0, 123, 0, 0, 1, 0, '', 1, 0, ' ', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalleactividadorganizacion`
--

CREATE TABLE `detalleactividadorganizacion` (
  `Actividad_Id` int(11) NOT NULL,
  `Organizacion_Id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `detalleactividadorganizacion`
--

INSERT INTO `detalleactividadorganizacion` (`Actividad_Id`, `Organizacion_Id`) VALUES
(12, 55),
(13, 11),
(14, 19),
(14, 20),
(15, 46),
(16, 58),
(17, 46),
(18, 17),
(19, 39),
(20, 14),
(20, 15),
(21, 42),
(22, 49),
(23, 61),
(24, 50),
(25, 2),
(25, 28),
(26, 62),
(27, 19),
(27, 32),
(27, 59),
(28, 4),
(29, 46),
(30, 65),
(31, 34),
(32, 66),
(33, 67),
(34, 5),
(35, 68),
(36, 68),
(37, 12),
(38, 19),
(38, 69),
(39, 70),
(40, 71),
(41, 72),
(42, 73),
(43, 75),
(44, 77),
(45, 30),
(45, 33),
(46, 46),
(46, 61),
(47, 46),
(48, 46),
(49, 46),
(50, 79),
(51, 46),
(52, 81),
(53, 44),
(54, 82),
(55, 17),
(56, 8),
(57, 10),
(58, 1),
(58, 9),
(59, 7),
(60, 13),
(61, 34),
(62, 4),
(63, 18),
(64, 35),
(65, 39),
(66, 36),
(67, 19),
(67, 59),
(68, 5),
(69, 14),
(69, 15),
(70, 18),
(70, 83),
(71, 49),
(72, 1),
(72, 38),
(73, 23),
(74, 23),
(75, 22),
(75, 44),
(75, 46),
(76, 12),
(77, 46),
(78, 84),
(79, 23),
(80, 32),
(81, 6),
(82, 6),
(83, 46),
(84, 44),
(85, 47),
(86, 47),
(87, 46),
(88, 35),
(89, 48),
(90, 47),
(91, 46),
(92, 47),
(93, 46),
(94, 46),
(95, 46),
(96, 30),
(96, 86),
(97, 28),
(98, 29),
(99, 29),
(100, 37),
(101, 30),
(101, 87),
(102, 30),
(102, 86),
(103, 28),
(104, 21),
(105, 35),
(105, 36),
(105, 46),
(106, 35),
(107, 35),
(108, 35),
(109, 31),
(110, 57),
(111, 27),
(112, 56),
(113, 3),
(114, 46),
(115, 46),
(116, 46),
(117, 47),
(118, 47),
(119, 41),
(120, 31),
(121, 31),
(122, 46),
(123, 46);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalleactividadunidad`
--

CREATE TABLE `detalleactividadunidad` (
  `UnidadEjecutora_Id` int(11) NOT NULL,
  `Actividad_Id` int(11) NOT NULL,
  `CatedraCarreraImpactada` varchar(100) DEFAULT NULL,
  `CantidadAlumnosInvolucrados` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `detalleactividadunidad`
--

INSERT INTO `detalleactividadunidad` (`UnidadEjecutora_Id`, `Actividad_Id`, `CatedraCarreraImpactada`, `CantidadAlumnosInvolucrados`) VALUES
(0, 13, NULL, NULL),
(0, 14, NULL, NULL),
(0, 15, NULL, NULL),
(0, 16, NULL, NULL),
(0, 17, NULL, NULL),
(0, 22, NULL, NULL),
(0, 24, NULL, NULL),
(0, 26, NULL, NULL),
(0, 27, NULL, NULL),
(0, 28, NULL, NULL),
(0, 45, NULL, NULL),
(0, 46, NULL, NULL),
(0, 60, NULL, NULL),
(0, 73, NULL, NULL),
(0, 84, NULL, NULL),
(0, 92, NULL, NULL),
(0, 95, NULL, NULL),
(0, 96, NULL, NULL),
(0, 97, NULL, NULL),
(0, 98, NULL, NULL),
(0, 107, NULL, NULL),
(0, 115, NULL, NULL),
(0, 123, NULL, NULL),
(2, 15, NULL, NULL),
(2, 48, NULL, NULL),
(2, 51, NULL, NULL),
(3, 19, NULL, NULL),
(3, 21, NULL, NULL),
(3, 65, NULL, NULL),
(3, 66, NULL, NULL),
(4, 14, NULL, NULL),
(4, 29, NULL, NULL),
(4, 31, NULL, NULL),
(4, 49, NULL, NULL),
(4, 51, NULL, NULL),
(4, 52, NULL, NULL),
(4, 54, NULL, NULL),
(4, 61, NULL, NULL),
(4, 75, NULL, NULL),
(4, 84, NULL, NULL),
(4, 89, NULL, NULL),
(4, 91, NULL, NULL),
(4, 93, NULL, NULL),
(4, 95, NULL, NULL),
(4, 96, NULL, NULL),
(4, 99, NULL, NULL),
(4, 101, NULL, NULL),
(4, 102, NULL, NULL),
(4, 107, NULL, NULL),
(4, 114, NULL, NULL),
(4, 115, NULL, NULL),
(4, 117, NULL, NULL),
(4, 118, NULL, NULL),
(4, 119, NULL, NULL),
(4, 122, NULL, NULL),
(4, 123, NULL, NULL),
(6, 12, NULL, NULL),
(6, 17, NULL, NULL),
(6, 23, NULL, NULL),
(6, 25, NULL, NULL),
(6, 28, NULL, NULL),
(6, 35, NULL, NULL),
(6, 38, NULL, NULL),
(6, 39, NULL, NULL),
(6, 43, NULL, NULL),
(6, 45, NULL, NULL),
(6, 46, NULL, NULL),
(6, 47, NULL, NULL),
(6, 72, NULL, NULL),
(6, 77, NULL, NULL),
(6, 80, NULL, NULL),
(6, 81, NULL, NULL),
(6, 82, NULL, NULL),
(6, 83, NULL, NULL),
(6, 100, NULL, NULL),
(6, 111, NULL, NULL),
(6, 120, NULL, NULL),
(6, 121, NULL, NULL),
(7, 25, NULL, NULL),
(7, 27, NULL, NULL),
(7, 40, NULL, NULL),
(7, 67, NULL, NULL),
(7, 78, NULL, NULL),
(7, 97, NULL, NULL),
(7, 103, NULL, NULL),
(7, 108, NULL, NULL),
(8, 24, NULL, NULL),
(8, 33, NULL, NULL),
(8, 34, NULL, NULL),
(8, 60, NULL, NULL),
(8, 68, NULL, NULL),
(8, 73, NULL, NULL),
(8, 74, NULL, NULL),
(8, 77, NULL, NULL),
(8, 79, NULL, NULL),
(8, 86, NULL, NULL),
(8, 104, NULL, NULL),
(8, 109, NULL, NULL),
(8, 116, NULL, NULL),
(9, 97, NULL, NULL),
(10, 56, NULL, NULL),
(10, 83, NULL, NULL),
(11, 37, NULL, NULL),
(11, 76, NULL, NULL),
(12, 75, NULL, NULL),
(14, 36, NULL, NULL),
(14, 98, NULL, NULL),
(15, 25, NULL, NULL),
(15, 92, NULL, NULL),
(15, 103, NULL, NULL),
(16, 13, NULL, NULL),
(16, 16, NULL, NULL),
(16, 26, NULL, NULL),
(16, 30, NULL, NULL),
(16, 37, NULL, NULL),
(16, 55, NULL, NULL),
(16, 63, NULL, NULL),
(16, 64, NULL, NULL),
(16, 70, NULL, NULL),
(16, 76, NULL, NULL),
(16, 105, NULL, NULL),
(16, 106, NULL, NULL),
(17, 22, NULL, NULL),
(17, 33, NULL, NULL),
(17, 92, NULL, NULL),
(17, 113, NULL, NULL),
(18, 31, NULL, NULL),
(18, 61, NULL, NULL),
(18, 62, NULL, NULL),
(18, 85, NULL, NULL),
(18, 89, NULL, NULL),
(19, 42, NULL, NULL),
(19, 90, NULL, NULL),
(19, 103, NULL, NULL),
(19, 108, NULL, NULL),
(19, 110, NULL, NULL),
(21, 18, NULL, NULL),
(21, 20, NULL, NULL),
(21, 41, NULL, NULL),
(21, 44, NULL, NULL),
(21, 57, NULL, NULL),
(21, 63, NULL, NULL),
(21, 69, NULL, NULL),
(21, 71, NULL, NULL),
(21, 87, NULL, NULL),
(21, 88, NULL, NULL),
(21, 94, NULL, NULL),
(21, 112, NULL, NULL),
(35, 32, NULL, NULL),
(37, 50, NULL, NULL),
(37, 58, NULL, NULL),
(37, 59, NULL, NULL),
(37, 106, NULL, NULL),
(38, 53, NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detallepersonaactividad`
--

CREATE TABLE `detallepersonaactividad` (
  `Actividad_Id` int(11) NOT NULL,
  `Persona_Id` int(10) NOT NULL,
  `Org_o_Uni` int(11) NOT NULL,
  `Rol_Id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `detallepersonaactividad`
--

INSERT INTO `detallepersonaactividad` (`Actividad_Id`, `Persona_Id`, `Org_o_Uni`, `Rol_Id`) VALUES
(12, 42, 1, 2),
(12, 44, 2, 2),
(13, 42, 1, 2),
(13, 48, 2, 2),
(13, 49, 2, 2),
(14, 42, 1, 2),
(14, 44, 2, 2),
(15, 17, 1, 2),
(15, 56, 2, 2),
(15, 57, 2, 2),
(16, 43, 2, 2),
(16, 44, 1, 3),
(17, 42, 1, 2),
(17, 44, 2, 2),
(18, 27, 1, 2),
(18, 30, 1, 2),
(18, 41, 2, 2),
(19, 36, 1, 2),
(19, 50, 2, 2),
(20, 44, 2, 2),
(20, 51, 1, 2),
(20, 52, 1, 2),
(21, 44, 2, 2),
(21, 53, 1, 2),
(22, 42, 1, 2),
(22, 54, 2, 2),
(22, 55, 2, 2),
(23, 4, 2, 2),
(23, 42, 1, 2),
(24, 3, 1, 2),
(24, 5, 1, 2),
(24, 15, 1, 2),
(24, 58, 2, 2),
(24, 59, 2, 2),
(25, 42, 1, 2),
(25, 60, 2, 2),
(25, 61, 2, 2),
(26, 48, 2, 2),
(26, 63, 1, 2),
(26, 64, 1, 2),
(26, 65, 1, 2),
(26, 66, 2, 2),
(27, 18, 1, 2),
(27, 67, 2, 2),
(28, 68, 2, 2),
(28, 70, 1, 2),
(29, 34, 1, 2),
(29, 45, 2, 2),
(29, 46, 2, 2),
(29, 69, 1, 2),
(33, 73, 2, 2),
(33, 74, 1, 2),
(34, 70, 2, 2),
(34, 71, 1, 2),
(34, 72, 1, 2),
(35, 75, 2, 2),
(36, 76, 2, 2),
(37, 77, 2, 2),
(37, 78, 2, 2),
(38, 43, 2, 2),
(38, 79, 1, 2),
(38, 80, 1, 2),
(39, 43, 2, 2),
(39, 82, 2, 2),
(40, 83, 1, 2),
(42, 84, 2, 2),
(42, 85, 1, 2),
(42, 86, 1, 2),
(43, 75, 2, 2),
(43, 87, 1, 2),
(44, 50, 2, 2),
(45, 88, 2, 2),
(45, 92, 1, 2),
(46, 4, 1, 2),
(46, 75, 2, 2),
(46, 89, 2, 2),
(46, 90, 2, 2),
(47, 43, 2, 2),
(47, 75, 2, 2),
(48, 14, 2, 2),
(48, 17, 1, 2),
(48, 89, 2, 2),
(48, 91, 2, 2),
(49, 92, 2, 2),
(50, 93, 1, 2),
(50, 94, 2, 2),
(51, 56, 2, 2),
(51, 95, 1, 2),
(51, 96, 2, 2),
(51, 98, 2, 2),
(52, 99, 2, 2),
(52, 100, 1, 2),
(53, 101, 2, 2),
(53, 102, 1, 2),
(54, 99, 2, 2),
(54, 103, 1, 2),
(55, 27, 1, 2),
(55, 30, 1, 2),
(55, 41, 2, 2),
(56, 9, 1, 2),
(56, 10, 1, 2),
(56, 104, 2, 2),
(56, 105, 2, 2),
(57, 2, 1, 2),
(57, 106, 2, 2),
(58, 31, 2, 2),
(58, 94, 2, 2),
(58, 107, 1, 2),
(58, 108, 1, 2),
(58, 109, 2, 2),
(59, 94, 2, 2),
(59, 108, 1, 2),
(59, 109, 2, 2),
(59, 110, 2, 2),
(59, 111, 1, 2),
(60, 67, 2, 2),
(60, 112, 1, 2),
(61, 13, 1, 2),
(61, 28, 1, 2),
(61, 114, 2, 2),
(61, 115, 2, 2),
(62, 103, 1, 2),
(62, 116, 2, 2),
(63, 48, 2, 2),
(63, 117, 1, 2),
(64, 118, 2, 2),
(64, 119, 1, 2),
(65, 36, 1, 2),
(65, 50, 2, 2),
(66, 37, 1, 2),
(66, 50, 2, 2),
(67, 67, 2, 2),
(68, 70, 2, 2),
(68, 71, 1, 2),
(68, 72, 1, 2),
(68, 73, 2, 2),
(69, 51, 1, 2),
(69, 52, 1, 2),
(69, 67, 2, 2),
(70, 48, 2, 2),
(70, 117, 1, 2),
(71, 42, 1, 2),
(71, 44, 2, 2),
(72, 42, 1, 2),
(72, 44, 2, 2),
(73, 38, 1, 2),
(73, 123, 2, 2),
(74, 35, 1, 2),
(74, 124, 2, 2),
(76, 42, 1, 2),
(76, 49, 2, 2),
(76, 77, 2, 2),
(77, 18, 1, 2),
(78, 125, 1, 2),
(78, 126, 1, 2),
(78, 127, 2, 2),
(79, 42, 1, 2),
(79, 44, 2, 2),
(80, 42, 1, 2),
(80, 44, 2, 2),
(81, 42, 1, 2),
(81, 43, 2, 2),
(81, 128, 2, 2),
(82, 42, 1, 2),
(82, 43, 2, 2),
(82, 128, 2, 2),
(83, 42, 1, 2),
(83, 104, 2, 2),
(84, 8, 1, 2),
(84, 129, 2, 2),
(85, 42, 1, 2),
(85, 44, 2, 2),
(86, 42, 1, 2),
(86, 44, 2, 2),
(87, 39, 1, 2),
(87, 44, 2, 2),
(88, 42, 1, 2),
(89, 13, 1, 2),
(89, 28, 1, 2),
(89, 114, 2, 2),
(89, 115, 2, 2),
(90, 42, 1, 2),
(90, 44, 2, 2),
(91, 18, 1, 2),
(91, 44, 2, 2),
(92, 42, 1, 2),
(92, 122, 2, 2),
(92, 130, 2, 2),
(92, 131, 2, 2),
(93, 18, 1, 2),
(94, 42, 1, 2),
(94, 44, 2, 2),
(95, 29, 1, 2),
(95, 34, 1, 2),
(95, 132, 2, 2),
(95, 133, 2, 2),
(96, 21, 1, 2),
(96, 134, 2, 2),
(97, 92, 1, 2),
(97, 135, 2, 2),
(98, 92, 1, 2),
(98, 136, 2, 2),
(98, 137, 2, 2),
(99, 92, 2, 2),
(100, 75, 2, 2),
(101, 19, 1, 2),
(101, 115, 2, 2),
(102, 21, 1, 2),
(102, 114, 2, 2),
(102, 138, 2, 2),
(103, 92, 1, 2),
(103, 139, 2, 2),
(104, 139, 2, 2),
(106, 109, 2, 2),
(107, 92, 1, 2),
(107, 141, 2, 2),
(108, 140, 2, 2),
(109, 142, 2, 2),
(110, 84, 2, 2),
(115, 92, 1, 2),
(116, 18, 1, 2),
(116, 142, 2, 2),
(123, 14, 1, 2),
(123, 143, 2, 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `informe`
--

CREATE TABLE `informe` (
  `Id` int(11) NOT NULL,
  `InformeUnidad` varchar(45) DEFAULT NULL,
  `FechaInformeUnidad` date DEFAULT NULL,
  `InformeOrganizacion` varchar(45) DEFAULT NULL,
  `FechaInformeOrganizacion` date DEFAULT NULL,
  `InformeComision` varchar(45) DEFAULT NULL,
  `FechaInformeComision` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `monedadeinversion`
--

CREATE TABLE `monedadeinversion` (
  `Id` int(11) NOT NULL,
  `Nombre` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `monedadeinversion`
--

INSERT INTO `monedadeinversion` (`Id`, `Nombre`) VALUES
(1, 'Peso Argentino'),
(2, 'Dolar Estadounidense'),
(3, 'Dolar Canadiense'),
(4, 'Euro'),
(5, 'Boliviano'),
(6, 'Real Brasileño'),
(7, 'Yuan');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `organizacion`
--

CREATE TABLE `organizacion` (
  `Id` int(11) NOT NULL,
  `Nombre` varchar(150) DEFAULT NULL,
  `Domicilio` varchar(45) DEFAULT NULL,
  `Localidad` varchar(45) DEFAULT NULL,
  `Provincia` varchar(45) DEFAULT NULL,
  `Pais` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `organizacion`
--

INSERT INTO `organizacion` (`Id`, `Nombre`, `Domicilio`, `Localidad`, `Provincia`, `Pais`) VALUES
(1, 'Cámara Minera de San Juan', NULL, NULL, NULL, NULL),
(2, 'Asociación Médica San Juan', NULL, NULL, NULL, NULL),
(3, 'Corte de Justicia de San Juan', NULL, NULL, NULL, NULL),
(4, 'Desarrollo de Prospectos Mineros S. A. (DEPROMINSA)', NULL, NULL, NULL, NULL),
(5, 'Empresa Accusys Technology SRL', NULL, NULL, NULL, NULL),
(6, 'Empresa Argentina Fortescue SAU', NULL, NULL, NULL, NULL),
(7, 'Empresa Austral Gold y Cámara Minera de San Juan', NULL, NULL, NULL, NULL),
(8, 'Empresa BGC Engeneering', NULL, NULL, NULL, NULL),
(9, 'Empresa Casposo Argentina LTD', NULL, NULL, NULL, NULL),
(10, 'Empresa EGG S.A.S.', NULL, NULL, NULL, NULL),
(11, 'Empresa Minera Piuquenes S.A.', NULL, NULL, NULL, NULL),
(12, 'Empresa Vector Argentina (AUSENCO)', NULL, NULL, NULL, NULL),
(13, 'Empresa WES S.A.S.', NULL, NULL, NULL, NULL),
(14, 'Escuela Universitaria de Ciencias de la Salud', NULL, NULL, NULL, NULL),
(15, 'Facultad de Arquitectura, Urbanismo y Diseño', NULL, NULL, NULL, NULL),
(16, 'Facultad de Ciencias Físico-Matemáticas y Naturales de la Universidad de San Luis', NULL, NULL, NULL, NULL),
(17, 'Facultad de Ciencias Químicas y Tecnológicas de la Universidad Católica de Cuyo', NULL, NULL, NULL, NULL),
(18, 'Facultad de Filosofía Humanidades y Artes', NULL, NULL, NULL, NULL),
(19, 'Federación de Entidades Profesionales Universitarias (FEPU)', NULL, NULL, NULL, NULL),
(20, 'Colegio Profesional de Ciencias Biológicas de San Juan', NULL, NULL, NULL, NULL),
(21, 'Fiscalía de Estado', NULL, NULL, NULL, NULL),
(22, 'Fundación Bioandina Argentina', NULL, NULL, NULL, NULL),
(23, 'Fundación Sadosky', NULL, NULL, NULL, NULL),
(24, 'Fundación Sadosky (línea A)', NULL, NULL, NULL, NULL),
(25, 'Fundación Sadosky (línea B)', NULL, NULL, NULL, NULL),
(26, 'Glencore Pachón y Observatorio Astronómico Felix Aguilar', NULL, NULL, NULL, NULL),
(27, 'Consejo de Coordinación para la protección de Glaciares (Gobierno de la Provincia de San Juan)', NULL, NULL, NULL, NULL),
(28, 'Ministerio de Educación (Gobierno de San Juan)', NULL, NULL, NULL, NULL),
(29, 'Ministerio de Gobierno de San Juan', NULL, NULL, NULL, NULL),
(30, 'Ministerio de la Producción y Desarrollo Económico', NULL, NULL, NULL, NULL),
(31, 'Ministerio de Minería', NULL, NULL, NULL, NULL),
(32, 'Empresa Golden Mining', NULL, NULL, NULL, NULL),
(33, 'Ministerio de Obras y Servicios Públicos', NULL, NULL, NULL, NULL),
(34, 'Ministerio de Salud Pública de la Provincia de San Juan', NULL, NULL, NULL, NULL),
(35, 'Ministerio de Turismo y Cultura del Gobierno de la Provincia de San Juan', NULL, NULL, NULL, NULL),
(36, 'Municipalidad de Pocito', NULL, NULL, NULL, NULL),
(37, 'Municipalidad de Angaco', NULL, NULL, NULL, NULL),
(38, 'Municipalidad de Calingasta', NULL, NULL, NULL, NULL),
(39, 'Municipalidad de Chimbas', NULL, NULL, NULL, NULL),
(40, 'Municipalidad de Jachal', NULL, NULL, NULL, NULL),
(41, 'Municipalidad de la Ciudad de San Juan', NULL, NULL, NULL, NULL),
(42, 'Municipalidad de Rawson', NULL, NULL, NULL, NULL),
(43, 'Municipalidad de Río Hurtado, Región de Coquimbo, Chile', NULL, NULL, NULL, NULL),
(44, 'Municipalidad de Rivadavia', NULL, NULL, NULL, NULL),
(45, 'Red Regional de Prácticas Socioeducativas de Universidades Públicas - Zona Cuyo ', NULL, NULL, NULL, NULL),
(46, 'Secretaría de Estado de Ambiente y Desarrollo Sustentable del Gobierno de la Provincia de San Juan (SEADS)', NULL, NULL, NULL, NULL),
(47, 'Secretaría de Estado de Ciencia, Tecnología e Innovación (SECITI)', NULL, NULL, NULL, NULL),
(48, 'Ministerio de Salud Pública', NULL, NULL, NULL, NULL),
(49, 'Secretaría de Estado de Seguridad y Orden Público', NULL, NULL, NULL, NULL),
(50, 'Secretaría de Tránsito y Transporte de la Provincia de San Juan (STyT)', NULL, NULL, NULL, NULL),
(51, 'Subsecretaría de Agricultura Familiar - Delegación San Juan, dependiente de la Secretaría de Desarrollo Rural y Agricultura Familiar del MAGP', NULL, NULL, NULL, NULL),
(52, 'Universidad Católica de Cuyo', NULL, NULL, NULL, NULL),
(53, 'Universidad de Ciego de Ávila Máximo Gómez Báez UNICA  - Cuba', NULL, NULL, NULL, NULL),
(54, 'Universidad Estatal a Distancia UNED - Costa Rica', NULL, NULL, NULL, NULL),
(55, 'Facultad de Ciencas Exactas (Universidad Nacional de La Pampa)', NULL, NULL, NULL, NULL),
(56, 'Universidad Nacional de Tierra del Fuego, Antártida e Islas del Atlántico Sur', NULL, NULL, NULL, NULL),
(57, 'Universidad Presbiteriana Mackenzie - Instituto Presbiteriano Mackenzie', NULL, NULL, NULL, NULL),
(58, 'Empresa Yamana Gold', NULL, NULL, NULL, NULL),
(59, 'Colegio Profesional de Geofísica de San Juan (COPROGEO)', NULL, NULL, NULL, NULL),
(60, 'Empresa AURORA MINING SRL', NULL, NULL, NULL, NULL),
(61, 'Dirección de Conservación y Áreas Protegidas (SEAyDS)', NULL, NULL, NULL, NULL),
(62, 'Servicio Geológico Minero Argentino (SEGEMAR)', NULL, NULL, NULL, NULL),
(63, 'Instituto Nacional del Agua (INA)', NULL, NULL, NULL, NULL),
(64, 'Empresa Filo del Sol Exploración S.A.', NULL, NULL, NULL, NULL),
(65, 'Instituto Provincial de Exploraciones y Explotaciones Mineras (IPEEM)', NULL, NULL, NULL, NULL),
(66, 'Universidad de La Serena', NULL, NULL, NULL, NULL),
(67, 'Municipalidad de San Martín', NULL, NULL, NULL, NULL),
(68, 'Universidad Nacional de La Rioja', NULL, NULL, NULL, NULL),
(69, 'Consejo Profesional de Ciencias Geológicas de San Juan', NULL, NULL, NULL, NULL),
(70, 'Empresa Filo del Sol Exploración S.A.', NULL, NULL, NULL, NULL),
(71, 'Secretaría de Agua y Energía (MOSP)', NULL, NULL, NULL, NULL),
(72, 'Facultad de Ciencias de la Universidad de La Serena', NULL, NULL, NULL, NULL),
(73, 'Corporación Universitaria para la Investigación Atmosférica - Centro Nacional para la Investigación Atmosférica (UCAR)', NULL, NULL, NULL, NULL),
(74, 'Universidad Nacional de Cuyo (UNCUYO)', NULL, NULL, NULL, NULL),
(75, 'Facultad de Ciencias Exactas y Naturales - UNCUYO', NULL, NULL, NULL, NULL),
(76, 'Universidad de Ciego de Ávila Máximo Gómez Baez UNICA - Cuba', NULL, NULL, NULL, NULL),
(77, 'Universidad Estatal a Distancia (UNED) - Costa Rica', NULL, NULL, NULL, NULL),
(78, 'Dirección de Conservación y Áreas Protegidas', NULL, NULL, NULL, NULL),
(79, 'Glencore Pachon', NULL, NULL, NULL, NULL),
(80, 'Glencore Pachon', NULL, NULL, NULL, NULL),
(81, 'Andes Corporación Minera S.A. - Proyecto minero de cobre Los Azules', NULL, NULL, NULL, NULL),
(82, 'Empresa Desarrollo de Prospectos Mineros S. A. - DEPROMINSA', NULL, NULL, NULL, NULL),
(83, 'Instituto de Investigaciones Arqueológicas y Museo Prof. Mariano Gambier (IIAM)', NULL, NULL, NULL, NULL),
(84, 'Centro de Investigaciones Ópticas, de la Universidad Nacional de la Plata (CIOp)', NULL, NULL, NULL, NULL),
(85, 'Consejo Nacional de Investigaciones Científicas y Técnicas (CONICET)', NULL, NULL, NULL, NULL),
(86, 'Dirección del Instituto Tecnológico y Hortícola Semillero (DITyHS)', NULL, NULL, NULL, NULL),
(87, 'Dirección de Sanidad Vegetal Animal y Alimentos (DSVAyA)', NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `persona`
--

CREATE TABLE `persona` (
  `Id` int(11) NOT NULL,
  `Nombre` varchar(45) DEFAULT NULL,
  `Titulo` varchar(20) NOT NULL,
  `CUIL` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `persona`
--

INSERT INTO `persona` (`Id`, `Nombre`, `Titulo`, `CUIL`) VALUES
(1, 'Jácome, Luis', 'Biologo', NULL),
(2, 'Cintas, Carla Agustina', 'Sra.', NULL),
(3, 'Romero, Carlos ', 'Sr.', NULL),
(4, 'Piedrahita, Cristian', '', NULL),
(5, 'Tapella, Daniel', 'Lic.', NULL),
(6, 'Directores de Dpto. de Física de FCFMN', '', NULL),
(7, 'Valladares, Diego', 'Dr.', NULL),
(8, 'Simoncelli, Iván (Dr.)', '', NULL),
(9, 'Arenson, Lukas U. ', 'Dr.', NULL),
(10, 'Wainstein, Pablo A.', 'Dr.', NULL),
(11, 'Centres, Paulo', 'Dr.', NULL),
(12, 'Porasso, Rodolfo ', 'Dr.', NULL),
(13, 'Salva, Liliana', 'Dra.', NULL),
(14, 'Ripoll, Yanina', 'Dra.', NULL),
(15, 'Parrón, Gabriela', 'Sra.', NULL),
(16, 'Delgado, Gustavo E. ', 'Ing.', NULL),
(17, 'Ing. Alfredo Morales', '', NULL),
(18, 'Grillo, Bruno', 'Ing.', NULL),
(19, 'Ing. Diego Molina', '', NULL),
(20, 'Ing. Juan Carlos Cabrera', '', NULL),
(21, 'Ing. Juan Manuel Raigón', '', NULL),
(22, 'Juan Pablo Pappalardoi ', '', NULL),
(23, 'Leonardo Blasco', 'Sr.', NULL),
(24, 'Lic. Ana María Graffigna ', '', NULL),
(25, 'Lic. Ariel Pittavino', '', NULL),
(26, 'Muñoz Riofrio, Daniel', 'Lic.', NULL),
(27, 'Ramírez,  Daniela ', 'Lic.', NULL),
(28, 'Lic. Florencia Cano Suárez.', '', NULL),
(29, 'Lic. Héctor Alejandro Gómez', '', NULL),
(30, 'Carmona, Mariano ', 'Lic.', NULL),
(31, 'Lic. Yanina Ripoll', '', NULL),
(32, 'Med. Vet. Ivan Simoncelli', '', NULL),
(33, 'Sr. Christian Speltin', '', NULL),
(34, 'Sr. Cristian Daniel Quiroga', '', NULL),
(35, 'Sr. Mariano Benet', '', NULL),
(36, 'Fernández, Carolina', 'Sra.', NULL),
(37, 'Sra. Lucía Norma Altamirano', '', NULL),
(38, 'Sra. Valeria Saieg', '', NULL),
(39, 'Tco. José Alberto Marinero', '', NULL),
(40, 'Tco. Pablo Emanuel Pastro', '', NULL),
(41, 'Schmitter de Salvo, Dinia ', 'Lic.', NULL),
(42, 'La Organización no declara RRHH', '', NULL),
(43, 'Torres, Gabriela ', 'Dra.', NULL),
(44, 'La Unidad no declara RRHH 	', '', NULL),
(45, 'MONTANI, María Cecilia', 'Lic.', NULL),
(46, 'Rodríguez Assaf, Leticia', 'Lic.', NULL),
(47, 'Olguin, Luis Alberto', 'Prog.', NULL),
(48, 'Perucca, Laura', 'Dra.', NULL),
(49, 'Onorato, María Romina', 'Dra.', NULL),
(50, 'Sirvente, Américo', 'Ing.', NULL),
(51, 'Marín Gómez, Critian F.', 'D.G.', NULL),
(52, 'Platero, Lorena', 'Arq.', NULL),
(53, 'Peluffo, María E.', 'Sra.', NULL),
(54, 'Zarate, Pedro', 'Abog.', NULL),
(55, 'Becerra, María', 'Abog.', NULL),
(56, 'Cappa, Flavio', 'Dr.', NULL),
(57, 'Borghi, Carlos', 'Dr.', NULL),
(58, 'Lund, María Inés', 'Mag.', NULL),
(59, 'Migani, Silvina', 'Lic.', NULL),
(60, 'Ariza, Juan Pablo', 'Dr.', NULL),
(61, 'Grosso, Mónica', 'Dra.', NULL),
(62, 'Asunto, Patricia', 'Prof.', NULL),
(63, 'Sánchez, Laura Miriam', 'Lic. ', NULL),
(64, 'Aza Funes, Felipe Alfredo', 'Ing.', NULL),
(65, 'Décima, María Fernanda', 'Lic.', NULL),
(66, 'Ormeño, Pablo Andrés', 'Dr.', NULL),
(67, 'No existe persona', '', NULL),
(68, 'Lorena Cristina Previley', 'Dra.', NULL),
(69, 'Beninato, Verónica', 'Dra. ', NULL),
(70, 'Aranda Romera, Juan Antonio', '', NULL),
(71, 'Pappalardo, Juan Carlos', '', NULL),
(72, 'Speltini, Christian', '', NULL),
(73, 'Otazú, Alejandra', 'Mag. Lic.', NULL),
(74, 'Alvarez, Anibal', 'Lic.', NULL),
(75, 'Pittaluga, María Alejandra', 'Dra. ', NULL),
(76, 'Lince Klinger, Federico', 'Dr.', NULL),
(77, 'Rothis, Luis Martín', 'Dr.', NULL),
(78, 'Alcacer Sánchez, Juan Manuel', 'Dr.', NULL),
(79, 'De Paula, Emiliano', 'Lic.', NULL),
(80, 'Carletto, Mauricio', 'Ing.', NULL),
(81, 'Bertoni, Juan Carlos', 'Dr.', NULL),
(82, 'Santi Malnis, Paula', 'Dra.', NULL),
(83, 'Cascón, Ramiro', 'Ing.', NULL),
(84, 'Francile, Carlos ', 'Dr.', NULL),
(85, 'Tomczyk, Steve', '', NULL),
(86, 'Propes, Alison', '', NULL),
(87, 'Gómez Figueroa, Javier', 'Lic.', NULL),
(88, 'Cabrera, Gerardo', 'Lic. ', NULL),
(89, 'Flores, Daniel', 'Dr.', NULL),
(90, 'Torres, Paula', '', NULL),
(91, 'Hadad, Martín', 'Dr. ', NULL),
(92, 'Aballay, Fernando', '', NULL),
(93, 'Fernando Villavicencio', 'Geologo senior ', NULL),
(94, 'Ana Cecilia Mugas ', 'Dra.', NULL),
(95, 'Federico Rio Yanes', 'Abogado', NULL),
(96, 'Campos, Valeria', 'Dra.', NULL),
(97, 'GARCIA, Gabriel', 'Dr.', NULL),
(98, 'GATICA, Gabriel', 'Dr.', NULL),
(99, 'MEGLIOLI, Carola', 'Lic', NULL),
(100, 'OVALLES BONGIOVANNI, Rodolfo Augusto', '', NULL),
(101, 'MOYA MONTIGEL, Victoria', 'CPN', NULL),
(102, 'JUAREZ, Fanny', 'Dra. ', NULL),
(103, 'NOVOA, Maria Gabriela', '', NULL),
(104, 'PASTORE, Silvio', 'Mag.', NULL),
(105, 'ALVAREZ PARMA, Gabriela ', 'Ing.', NULL),
(106, 'DIAZ, Mario Roberto', 'Dr. ', NULL),
(107, 'FEMENIA, Ruben', 'CPN', NULL),
(108, 'CABANAY, Raul.', 'Ing.', NULL),
(109, 'CASTRO de MACHUCA, Brígida', 'Dra. ', NULL),
(110, 'LOPEZ, Maria Gimena', '', NULL),
(111, 'SOTARELLO, Gustavo', 'Lic.', NULL),
(112, 'BACA ADARO, Daniel Alberto', '', NULL),
(113, 'VENERANDO, Silvia Alejandra', 'Dra. ', NULL),
(114, 'MURUA, Alberico Fernando', 'Biólogo', NULL),
(115, 'VILLAVICENCIO, Héctor José ', 'Dr.', NULL),
(116, 'MARTINEZ, Ricardo', 'Dr.', NULL),
(117, 'MALLEA, Claudia', 'Mag.', NULL),
(118, 'BRACCO, Adriana', 'Lic.', NULL),
(119, 'GRYNSZPAN, Claudia', 'Lic.', NULL),
(120, 'PINTO, Angel', 'Lic.', NULL),
(121, 'VELASCO, Efrain Guillermo', 'Arq.', NULL),
(122, 'NUÑEZ, Natalia', 'Dra. ', NULL),
(123, 'MILLAN, Flavia', '', NULL),
(124, 'ORTEGA, Manuel', 'Lic.', NULL),
(125, 'VAVELIUK, Pablo', 'Dr.', NULL),
(126, 'TORCHIA, Gustavo A', 'Dr.', NULL),
(127, 'GOMEZ, María Graciela ', 'Lic.', NULL),
(128, 'PONTORIERO, Sandra', 'Lic.', NULL),
(129, 'ADARVEZ GIOVANINI, Silvina', 'Lic.', NULL),
(130, 'LOPEZ, Fernando M', 'Dr.', NULL),
(131, 'ORMEÑO, Emilio', 'Lic.', NULL),
(132, 'ACOSTA, Juan Carlos', 'Dr.', NULL),
(133, 'BLANCO, Graciela', 'Dra. ', NULL),
(134, 'FLAQUÉ, Valeria ', 'Lic.', NULL),
(135, 'GIL HUTTON, Ricardo', 'Dr.', NULL),
(136, 'GREGORI, Salvador Daniel ', 'Dr.', NULL),
(137, 'COBOS, Francisco Ruiz', 'Dr.', NULL),
(138, 'DIAZ NIETO, Leonardo Martin', 'Dr.', NULL),
(139, 'COLDWELL, Georgina', 'Dra. ', NULL),
(140, 'PODESTÁ, Ricardo', 'Dr.', NULL),
(141, 'GIANNONI, Stella', 'Dra. ', NULL),
(142, 'DIAZ, Luis Aldo', 'Lic.', NULL),
(143, 'BLANCO FAGER, Rosa Verónica ', 'Lic.', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rol`
--

CREATE TABLE `rol` (
  `Id` int(11) NOT NULL,
  `Nombre` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `rol`
--

INSERT INTO `rol` (`Id`, `Nombre`) VALUES
(1, 'Coordinador General'),
(2, 'Representante Técnico');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipoactividad`
--

CREATE TABLE `tipoactividad` (
  `Id` int(11) NOT NULL,
  `Nombre` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `tipoactividad`
--

INSERT INTO `tipoactividad` (`Id`, `Nombre`) VALUES
(1, 'Acta Complementaria'),
(2, 'Acta Complementaria de Prácticas Profesionales Asistidas'),
(3, 'Acta Compromiso'),
(4, 'Acta Constitutiva'),
(5, 'Acta de Colaboración'),
(6, 'Acta Intención'),
(7, 'Acta Inter Facultades'),
(8, 'Adenda'),
(9, 'Convenio de Servicio de Asistencia Técnica'),
(10, 'Convenio Específico de Asistencia Técnica'),
(11, 'Convenio Específico'),
(12, 'Convenio Específico de Cooperación, Capacitación y Asistencia Técnica'),
(13, 'Convenio Específico de Prácticas Profesionales Situadas No Rentadas'),
(14, 'Convenio Específico de Servicio de Asistencia Técnica'),
(15, 'Convenio Marco de Cooperación'),
(16, 'Carta Compromiso'),
(17, 'Carta de Intención ');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ubicacionarchivo`
--

CREATE TABLE `ubicacionarchivo` (
  `Id` int(11) NOT NULL,
  `UbicacionOriginal` varchar(45) DEFAULT NULL,
  `UbicacionCopia` varchar(45) DEFAULT NULL,
  `UbicacionDigital` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `unidadejecutora`
--

CREATE TABLE `unidadejecutora` (
  `Id` int(11) NOT NULL,
  `Unidad` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `unidadejecutora`
--

INSERT INTO `unidadejecutora` (`Id`, `Unidad`) VALUES
(2, 'Centro de Investigaciones de la Geósfera y Biosfera (CIGEOBIO)'),
(3, 'Centro Tecnológico Educativo (CTC)'),
(4, 'Departamento de Biología '),
(5, 'Departamento de Física'),
(6, 'Departamento de Geología'),
(7, 'Departamento de Geofísica y Astronomía'),
(8, 'Departamento de Informática'),
(9, 'Gabinete de Ciencias Planetarias'),
(10, 'Gabinete de Estudios de Geocriología, Glaciología, Nivología y Cambio Climático'),
(11, 'Gabinete de Neotectónica y Geomorfología'),
(12, 'Gabinete de Investigación de Servicios Ecosistémicos de Zonas Áridas (GISEZA)'),
(13, 'IIAM'),
(14, 'Instituo Geofísico Sismológico \"Ing. Fernando S. Volponi\" (IGSV)'),
(15, 'Instituto de Ciencias Astronómicas de la Tierra y del Espacio (ICATE)'),
(16, 'Instituto de Geología \"Dr. Emiliano P. Aparicio\" (INGEO)'),
(17, 'Instituto de Informática'),
(18, 'Instituto y Museo de Ciencias Naturales'),
(19, 'Observatorio Astronómico \"Felix Aguilar\" (OAFA)'),
(20, 'Programa de Investigación Educación a Distancia - FCEFN'),
(21, 'FCEFN UNSJ'),
(33, 'Colegio Profesional de Geofísica (COPROGEO)'),
(34, 'Federación de Entidades Profesionales Universitarias (FEPU)'),
(35, 'Departamento de Posgrado'),
(36, 'Empresa Filo del Sol Exploración S.A.'),
(37, 'Gabinete de Mineralogía y Petrología del Instituto de Geología Dr. E. Aparicio'),
(38, 'Secretaría Administrativo – Financiera');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `user_tbl`
--

CREATE TABLE `user_tbl` (
  `userID` int(5) UNSIGNED NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `user_tbl`
--

INSERT INTO `user_tbl` (`userID`, `username`, `password`) VALUES
(3, 'admin', 'admin123)'),
(4, 'Micaela', 'Micaela2025'),
(5, 'Patricia', 'Patricia2025');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `actividad`
--
ALTER TABLE `actividad`
  ADD PRIMARY KEY (`Id`);

--
-- Indices de la tabla `detalleactividadorganizacion`
--
ALTER TABLE `detalleactividadorganizacion`
  ADD PRIMARY KEY (`Actividad_Id`,`Organizacion_Id`);

--
-- Indices de la tabla `detalleactividadunidad`
--
ALTER TABLE `detalleactividadunidad`
  ADD PRIMARY KEY (`UnidadEjecutora_Id`,`Actividad_Id`);

--
-- Indices de la tabla `detallepersonaactividad`
--
ALTER TABLE `detallepersonaactividad`
  ADD PRIMARY KEY (`Actividad_Id`,`Persona_Id`) USING BTREE;

--
-- Indices de la tabla `informe`
--
ALTER TABLE `informe`
  ADD PRIMARY KEY (`Id`);

--
-- Indices de la tabla `monedadeinversion`
--
ALTER TABLE `monedadeinversion`
  ADD PRIMARY KEY (`Id`);

--
-- Indices de la tabla `organizacion`
--
ALTER TABLE `organizacion`
  ADD PRIMARY KEY (`Id`);

--
-- Indices de la tabla `persona`
--
ALTER TABLE `persona`
  ADD PRIMARY KEY (`Id`);

--
-- Indices de la tabla `rol`
--
ALTER TABLE `rol`
  ADD PRIMARY KEY (`Id`);

--
-- Indices de la tabla `tipoactividad`
--
ALTER TABLE `tipoactividad`
  ADD PRIMARY KEY (`Id`);

--
-- Indices de la tabla `ubicacionarchivo`
--
ALTER TABLE `ubicacionarchivo`
  ADD PRIMARY KEY (`Id`);

--
-- Indices de la tabla `unidadejecutora`
--
ALTER TABLE `unidadejecutora`
  ADD PRIMARY KEY (`Id`);

--
-- Indices de la tabla `user_tbl`
--
ALTER TABLE `user_tbl`
  ADD PRIMARY KEY (`userID`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `actividad`
--
ALTER TABLE `actividad`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=124;
--
-- AUTO_INCREMENT de la tabla `informe`
--
ALTER TABLE `informe`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `organizacion`
--
ALTER TABLE `organizacion`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=88;
--
-- AUTO_INCREMENT de la tabla `persona`
--
ALTER TABLE `persona`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=144;
--
-- AUTO_INCREMENT de la tabla `rol`
--
ALTER TABLE `rol`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `tipoactividad`
--
ALTER TABLE `tipoactividad`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
--
-- AUTO_INCREMENT de la tabla `ubicacionarchivo`
--
ALTER TABLE `ubicacionarchivo`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `unidadejecutora`
--
ALTER TABLE `unidadejecutora`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;
--
-- AUTO_INCREMENT de la tabla `user_tbl`
--
ALTER TABLE `user_tbl`
  MODIFY `userID` int(5) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
