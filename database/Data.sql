--
-- PostgreSQL database dump
--

-- Dumped from database version 16.0
-- Dumped by pg_dump version 16.0

-- Started on 2023-12-06 05:26:49

SET statement_timeout = 0;
SET lock_timeout = 0;
SET idle_in_transaction_session_timeout = 0;
SET client_encoding = 'UTF8';
SET standard_conforming_strings = on;
SELECT pg_catalog.set_config('search_path', '', false);
SET check_function_bodies = false;
SET xmloption = content;
SET client_min_messages = warning;
SET row_security = off;

--
-- TOC entry 4930 (class 0 OID 44289)
-- Dependencies: 230
-- Data for Name: categorias; Type: TABLE DATA; Schema: public; Owner: -
--

INSERT INTO public.categorias VALUES (1, 'Pizzas Premium', '2023-12-06 09:25:19', '2023-12-06 09:25:19');
INSERT INTO public.categorias VALUES (2, 'Pizzas Normales', '2023-12-06 09:25:19', '2023-12-06 09:25:19');


--
-- TOC entry 4918 (class 0 OID 44211)
-- Dependencies: 218
-- Data for Name: users; Type: TABLE DATA; Schema: public; Owner: -
--

INSERT INTO public.users VALUES (1, 'Dario Suarez Lazarte', 'dsuarezlazarte@gmail.com', NULL, '$2y$12$IngF5JcdKDRiAxcDVxJ1eO1cQFV6AzHunuMWmnvKKXbWBDWJl3MgW', NULL, NULL, NULL, true, '2023-12-06 09:25:20', '2023-12-06 09:25:20', NULL, NULL, NULL);
INSERT INTO public.users VALUES (2, 'Jorge Ballivian Ocampo', 'jorge@gmail.com', NULL, '$2y$12$BFwCRNgeYyc2BXctKBikp.qAq58HapME.nOqWUznEjv.w0ITfrHEG', NULL, NULL, NULL, true, '2023-12-06 09:25:20', '2023-12-06 09:25:20', NULL, NULL, NULL);
INSERT INTO public.users VALUES (3, 'Alison Tacoo Maturano', 'alison@gmail.com', NULL, '$2y$12$Ar5N7S2Sqsjx4T1jdc1OSeJijIm5q7kUQ5vXS8WHhTciuXNmOoVWO', NULL, NULL, NULL, true, '2023-12-06 09:25:20', '2023-12-06 09:25:20', NULL, NULL, NULL);
INSERT INTO public.users VALUES (4, 'Cliente 1', 'cliente1@gmail.com', NULL, '$2y$12$.mPWDxPo8BPnP80FtOIY/O48mf1nTPKFPwfefsHFVIVjVEIKv26PS', NULL, NULL, NULL, false, '2023-12-06 09:25:20', '2023-12-06 09:25:20', NULL, NULL, NULL);
INSERT INTO public.users VALUES (5, 'Cliente 2', 'cliente2@gmail.com', NULL, '$2y$12$CRWJEgYJcuZvCyspqcPy8urrlD0gboGK7q0td6u6tRKFzKnjGjfFG', NULL, NULL, NULL, false, '2023-12-06 09:25:21', '2023-12-06 09:25:21', NULL, NULL, NULL);
INSERT INTO public.users VALUES (6, 'Cliente 3', 'cliente3@gmail.com', NULL, '$2y$12$tPFfk093vrrGydvvUJljme35P1UxQWeewhLEHgg4zFq.pvqrGlZBG', NULL, NULL, NULL, false, '2023-12-06 09:25:21', '2023-12-06 09:25:21', NULL, NULL, NULL);


--
-- TOC entry 4926 (class 0 OID 44263)
-- Dependencies: 226
-- Data for Name: clientes; Type: TABLE DATA; Schema: public; Owner: -
--



--
-- TOC entry 4928 (class 0 OID 44277)
-- Dependencies: 228
-- Data for Name: pedidos; Type: TABLE DATA; Schema: public; Owner: -
--



--
-- TOC entry 4932 (class 0 OID 44296)
-- Dependencies: 232
-- Data for Name: pizzas; Type: TABLE DATA; Schema: public; Owner: -
--

INSERT INTO public.pizzas VALUES (1, 'CHESSEBURGER - GRANDE', 56.00, 'https://.jpg', 'CARNE MOLIDA, TOCINO Y CHEDDAR.', 'Grande', 1, '2023-12-06 09:25:19', '2023-12-06 09:25:19');
INSERT INTO public.pizzas VALUES (2, 'CHESSEBURGER - PEQUEÑA', 32.00, 'https://.jpg', 'CARNE MOLIDA, TOCINO Y CHEDDAR.', 'Pequeña', 1, '2023-12-06 09:25:19', '2023-12-06 09:25:19');
INSERT INTO public.pizzas VALUES (3, '4 QUESOS - GRANDE', 56.00, 'https://.jpg', 'MOZZARELLA, CHEDDAR, REQUESÓN Y ROQUEFORT.', 'Grande', 1, '2023-12-06 09:25:19', '2023-12-06 09:25:19');
INSERT INTO public.pizzas VALUES (4, '4 QUESOS - PEQUEÑA', 32.00, 'https://.jpg', 'MOZZARELLA, CHEDDAR, REQUESÓN Y ROQUEFORT.', 'Pequeña', 1, '2023-12-06 09:25:19', '2023-12-06 09:25:19');
INSERT INTO public.pizzas VALUES (5, 'STROGONOFF - GRANDE', 54.00, 'https://.jpg', 'POLLO, JAMÓN, PAPAS FRITAS Y MOZZARELLA.', 'Grande', 1, '2023-12-06 09:25:19', '2023-12-06 09:25:19');
INSERT INTO public.pizzas VALUES (6, 'STROGONOFF - PEQUEÑA', 30.00, 'https://.jpg', 'POLLO, JAMÓN, PAPAS FRITAS Y MOZZARELLA.', 'Pequeña', 1, '2023-12-06 09:25:19', '2023-12-06 09:25:19');
INSERT INTO public.pizzas VALUES (7, 'CARNIVORA - GRANDE', 54.00, 'https://.jpg', 'CARNE MOLIDA, JAMÓN, CHOCLO Y CHEDDAR.', 'Grande', 1, '2023-12-06 09:25:19', '2023-12-06 09:25:19');
INSERT INTO public.pizzas VALUES (8, 'CARNIVORA - PEQUEÑA', 30.00, 'https://.jpg', 'CARNE MOLIDA, JAMÓN, CHOCLO Y CHEDDAR.', 'Pequeña', 1, '2023-12-06 09:25:19', '2023-12-06 09:25:19');
INSERT INTO public.pizzas VALUES (9, 'PERNIL - GRANDE', 52.00, 'https://.jpg', 'PERNIL DE CERDO, PIMENTÓN, CHOCLO Y MOZZARELLA.', 'Grande', 1, '2023-12-06 09:25:19', '2023-12-06 09:25:19');
INSERT INTO public.pizzas VALUES (10, 'PERNIL - PEQUEÑA', 28.00, 'https://.jpg', 'PERNIL DE CERDO, PIMENTÓN, CHOCLO Y MOZZARELLA.', 'Pequeña', 1, '2023-12-06 09:25:19', '2023-12-06 09:25:19');
INSERT INTO public.pizzas VALUES (11, '3 QUESOS - GRANDE', 50.00, 'https://.jpg', 'MOZZARELLA, CHEDDAR Y REQUESÓN.', 'Grande', 1, '2023-12-06 09:25:19', '2023-12-06 09:25:19');
INSERT INTO public.pizzas VALUES (12, '3 QUESOS - PEQUEÑA', 28.00, 'https://.jpg', 'MOZZARELLA, CHEDDAR Y REQUESÓN.', 'Pequeña', 1, '2023-12-06 09:25:19', '2023-12-06 09:25:19');
INSERT INTO public.pizzas VALUES (13, 'CALABRESA - GRANDE', 48.00, 'https://.jpg', 'CALABRESA, MOZZARELLA, CHOCLO O ACEITUNAS.', 'Grande', 2, '2023-12-06 09:25:19', '2023-12-06 09:25:19');
INSERT INTO public.pizzas VALUES (14, 'CALABRESA - PEQUEÑA', 26.00, 'https://.jpg', 'CALABRESA, MOZZARELLA, CHOCLO O ACEITUNAS.', 'Pequeña', 2, '2023-12-06 09:25:19', '2023-12-06 09:25:19');
INSERT INTO public.pizzas VALUES (15, 'AMERICANA - GRANDE', 48.00, 'https://.jpg', 'HUEVO, TOCINO Y MOZZARELLA.', 'Grande', 2, '2023-12-06 09:25:19', '2023-12-06 09:25:19');
INSERT INTO public.pizzas VALUES (16, 'AMERICANA - PEQUEÑA', 26.00, 'https://.jpg', 'HUEVO, TOCINO Y MOZZARELLA.', 'Pequeña', 2, '2023-12-06 09:25:19', '2023-12-06 09:25:19');
INSERT INTO public.pizzas VALUES (17, 'PEPERONI - GRANDE', 48.00, 'https://.jpg', 'PEPERONI Y MOZZARELLA.', 'Grande', 2, '2023-12-06 09:25:19', '2023-12-06 09:25:19');
INSERT INTO public.pizzas VALUES (18, 'PEPERONI - PEQUEÑA', 26.00, 'https://.jpg', 'PEPERONI Y MOZZARELLA.', 'Pequeña', 2, '2023-12-06 09:25:19', '2023-12-06 09:25:19');
INSERT INTO public.pizzas VALUES (19, 'VEGETARIANA - GRANDE', 48.00, 'https://.jpg', 'TOMATE, CHAMPIÑONES, PIMENTÓN, CHOCLO Y MOZZARELLA.', 'Grande', 2, '2023-12-06 09:25:19', '2023-12-06 09:25:19');
INSERT INTO public.pizzas VALUES (20, 'VEGETARIANA - PEQUEÑA', 26.00, 'https://.jpg', 'TOMATE, CHAMPIÑONES, PIMENTÓN, CHOCLO Y MOZZARELLA.', 'Pequeña', 2, '2023-12-06 09:25:19', '2023-12-06 09:25:19');
INSERT INTO public.pizzas VALUES (21, 'HAWAIANA - GRANDE', 46.00, 'https://.jpg', 'JAMÓN, PIÑA Y MOZZARELLA.', 'Grande', 2, '2023-12-06 09:25:19', '2023-12-06 09:25:19');
INSERT INTO public.pizzas VALUES (22, 'HAWAIANA - PEQUEÑA', 24.00, 'https://.jpg', 'JAMÓN, PIÑA Y MOZZARELLA.', 'Pequeña', 2, '2023-12-06 09:25:19', '2023-12-06 09:25:19');
INSERT INTO public.pizzas VALUES (23, 'CLÁSICA - GRANDE', 44.00, 'https://.jpg', 'JAMÓN, CHOCLO Y MOZZARELLA.', 'Grande', 2, '2023-12-06 09:25:19', '2023-12-06 09:25:19');
INSERT INTO public.pizzas VALUES (24, 'CLÁSICA - PEQUEÑA', 24.00, 'https://.jpg', 'JAMÓN, CHOCLO Y MOZZARELLA.', 'Pequeña', 2, '2023-12-06 09:25:19', '2023-12-06 09:25:19');
INSERT INTO public.pizzas VALUES (25, 'MARGARITA - GRANDE', 40.00, 'https://.jpg', 'TOMATE Y MOZZARELLA.', 'Grande', 2, '2023-12-06 09:25:19', '2023-12-06 09:25:19');
INSERT INTO public.pizzas VALUES (26, 'MARGARITA - PEQUEÑA', 22.00, 'https://.jpg', 'TOMATE Y MOZZARELLA.', 'Pequeña', 2, '2023-12-06 09:25:19', '2023-12-06 09:25:19');
INSERT INTO public.pizzas VALUES (27, 'ECONÓMICA - GRANDE', 38.00, 'https://.jpg', 'MOZZARELLA Y ORÉGANO.', 'Grande', 2, '2023-12-06 09:25:19', '2023-12-06 09:25:19');
INSERT INTO public.pizzas VALUES (28, 'ECONÓMICA - PEQUEÑA', 22.00, 'https://.jpg', 'MOZZARELLA Y ORÉGANO.', 'Pequeña', 2, '2023-12-06 09:25:19', '2023-12-06 09:25:19');


--
-- TOC entry 4934 (class 0 OID 44310)
-- Dependencies: 234
-- Data for Name: detalle_pedidos; Type: TABLE DATA; Schema: public; Owner: -
--



--
-- TOC entry 4921 (class 0 OID 44230)
-- Dependencies: 221
-- Data for Name: failed_jobs; Type: TABLE DATA; Schema: public; Owner: -
--



--
-- TOC entry 4916 (class 0 OID 43971)
-- Dependencies: 216
-- Data for Name: migrations; Type: TABLE DATA; Schema: public; Owner: -
--

INSERT INTO public.migrations VALUES (23, '2014_10_12_000000_create_users_table', 1);
INSERT INTO public.migrations VALUES (24, '2014_10_12_100000_create_password_reset_tokens_table', 1);
INSERT INTO public.migrations VALUES (25, '2014_10_12_200000_add_two_factor_columns_to_users_table', 1);
INSERT INTO public.migrations VALUES (26, '2019_08_19_000000_create_failed_jobs_table', 1);
INSERT INTO public.migrations VALUES (27, '2019_12_14_000001_create_personal_access_tokens_table', 1);
INSERT INTO public.migrations VALUES (28, '2023_11_07_022139_create_sessions_table', 1);
INSERT INTO public.migrations VALUES (29, '2023_12_06_022708_create_clientes_table', 1);
INSERT INTO public.migrations VALUES (30, '2023_12_06_023026_create_pedidos_table', 1);
INSERT INTO public.migrations VALUES (31, '2023_12_06_023027_create_categorias_table', 1);
INSERT INTO public.migrations VALUES (32, '2023_12_06_023028_create_pizzas_table', 1);
INSERT INTO public.migrations VALUES (33, '2023_12_06_023734_create_detalle_pedidos_table', 1);


--
-- TOC entry 4919 (class 0 OID 44222)
-- Dependencies: 219
-- Data for Name: password_reset_tokens; Type: TABLE DATA; Schema: public; Owner: -
--



--
-- TOC entry 4923 (class 0 OID 44242)
-- Dependencies: 223
-- Data for Name: personal_access_tokens; Type: TABLE DATA; Schema: public; Owner: -
--



--
-- TOC entry 4924 (class 0 OID 44253)
-- Dependencies: 224
-- Data for Name: sessions; Type: TABLE DATA; Schema: public; Owner: -
--



--
-- TOC entry 4940 (class 0 OID 0)
-- Dependencies: 229
-- Name: categorias_id_seq; Type: SEQUENCE SET; Schema: public; Owner: -
--

SELECT pg_catalog.setval('public.categorias_id_seq', 2, true);


--
-- TOC entry 4941 (class 0 OID 0)
-- Dependencies: 225
-- Name: clientes_id_seq; Type: SEQUENCE SET; Schema: public; Owner: -
--

SELECT pg_catalog.setval('public.clientes_id_seq', 1, false);


--
-- TOC entry 4942 (class 0 OID 0)
-- Dependencies: 233
-- Name: detalle_pedidos_id_seq; Type: SEQUENCE SET; Schema: public; Owner: -
--

SELECT pg_catalog.setval('public.detalle_pedidos_id_seq', 1, false);


--
-- TOC entry 4943 (class 0 OID 0)
-- Dependencies: 220
-- Name: failed_jobs_id_seq; Type: SEQUENCE SET; Schema: public; Owner: -
--

SELECT pg_catalog.setval('public.failed_jobs_id_seq', 1, false);


--
-- TOC entry 4944 (class 0 OID 0)
-- Dependencies: 215
-- Name: migrations_id_seq; Type: SEQUENCE SET; Schema: public; Owner: -
--

SELECT pg_catalog.setval('public.migrations_id_seq', 33, true);


--
-- TOC entry 4945 (class 0 OID 0)
-- Dependencies: 227
-- Name: pedidos_id_seq; Type: SEQUENCE SET; Schema: public; Owner: -
--

SELECT pg_catalog.setval('public.pedidos_id_seq', 1, false);


--
-- TOC entry 4946 (class 0 OID 0)
-- Dependencies: 222
-- Name: personal_access_tokens_id_seq; Type: SEQUENCE SET; Schema: public; Owner: -
--

SELECT pg_catalog.setval('public.personal_access_tokens_id_seq', 1, false);


--
-- TOC entry 4947 (class 0 OID 0)
-- Dependencies: 231
-- Name: pizzas_id_seq; Type: SEQUENCE SET; Schema: public; Owner: -
--

SELECT pg_catalog.setval('public.pizzas_id_seq', 28, true);


--
-- TOC entry 4948 (class 0 OID 0)
-- Dependencies: 217
-- Name: users_id_seq; Type: SEQUENCE SET; Schema: public; Owner: -
--

SELECT pg_catalog.setval('public.users_id_seq', 6, true);


-- Completed on 2023-12-06 05:26:49

--
-- PostgreSQL database dump complete
--

