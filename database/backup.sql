--
-- PostgreSQL database dump
--

-- Dumped from database version 16.0
-- Dumped by pg_dump version 16.0

-- Started on 2023-12-06 00:08:23

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

SET default_tablespace = '';

SET default_table_access_method = heap;

--
-- TOC entry 230 (class 1259 OID 43450)
-- Name: categorias; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.categorias (
    id bigint NOT NULL,
    nombre character varying(255) NOT NULL,
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone
);


ALTER TABLE public.categorias OWNER TO postgres;

--
-- TOC entry 229 (class 1259 OID 43449)
-- Name: categorias_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.categorias_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER SEQUENCE public.categorias_id_seq OWNER TO postgres;

--
-- TOC entry 4951 (class 0 OID 0)
-- Dependencies: 229
-- Name: categorias_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.categorias_id_seq OWNED BY public.categorias.id;


--
-- TOC entry 226 (class 1259 OID 43424)
-- Name: clientes; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.clientes (
    id bigint NOT NULL,
    user_id bigint NOT NULL,
    "numeroTelf" integer NOT NULL,
    direccion text NOT NULL,
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone
);


ALTER TABLE public.clientes OWNER TO postgres;

--
-- TOC entry 225 (class 1259 OID 43423)
-- Name: clientes_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.clientes_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER SEQUENCE public.clientes_id_seq OWNER TO postgres;

--
-- TOC entry 4952 (class 0 OID 0)
-- Dependencies: 225
-- Name: clientes_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.clientes_id_seq OWNED BY public.clientes.id;


--
-- TOC entry 234 (class 1259 OID 43471)
-- Name: detalle_pedidos; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.detalle_pedidos (
    id bigint NOT NULL,
    pedido_id bigint NOT NULL,
    pizza_id bigint NOT NULL,
    cantidad integer NOT NULL,
    subtotal numeric(8,2) NOT NULL,
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone
);


ALTER TABLE public.detalle_pedidos OWNER TO postgres;

--
-- TOC entry 233 (class 1259 OID 43470)
-- Name: detalle_pedidos_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.detalle_pedidos_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER SEQUENCE public.detalle_pedidos_id_seq OWNER TO postgres;

--
-- TOC entry 4953 (class 0 OID 0)
-- Dependencies: 233
-- Name: detalle_pedidos_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.detalle_pedidos_id_seq OWNED BY public.detalle_pedidos.id;


--
-- TOC entry 221 (class 1259 OID 43391)
-- Name: failed_jobs; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.failed_jobs (
    id bigint NOT NULL,
    uuid character varying(255) NOT NULL,
    connection text NOT NULL,
    queue text NOT NULL,
    payload text NOT NULL,
    exception text NOT NULL,
    failed_at timestamp(0) without time zone DEFAULT CURRENT_TIMESTAMP NOT NULL
);


ALTER TABLE public.failed_jobs OWNER TO postgres;

--
-- TOC entry 220 (class 1259 OID 43390)
-- Name: failed_jobs_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.failed_jobs_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER SEQUENCE public.failed_jobs_id_seq OWNER TO postgres;

--
-- TOC entry 4954 (class 0 OID 0)
-- Dependencies: 220
-- Name: failed_jobs_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.failed_jobs_id_seq OWNED BY public.failed_jobs.id;


--
-- TOC entry 216 (class 1259 OID 25233)
-- Name: migrations; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.migrations (
    id integer NOT NULL,
    migration character varying(255) NOT NULL,
    batch integer NOT NULL
);


ALTER TABLE public.migrations OWNER TO postgres;

--
-- TOC entry 215 (class 1259 OID 25232)
-- Name: migrations_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.migrations_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER SEQUENCE public.migrations_id_seq OWNER TO postgres;

--
-- TOC entry 4955 (class 0 OID 0)
-- Dependencies: 215
-- Name: migrations_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.migrations_id_seq OWNED BY public.migrations.id;


--
-- TOC entry 219 (class 1259 OID 43383)
-- Name: password_reset_tokens; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.password_reset_tokens (
    email character varying(255) NOT NULL,
    token character varying(255) NOT NULL,
    created_at timestamp(0) without time zone
);


ALTER TABLE public.password_reset_tokens OWNER TO postgres;

--
-- TOC entry 228 (class 1259 OID 43438)
-- Name: pedidos; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.pedidos (
    id bigint NOT NULL,
    cliente_id bigint NOT NULL,
    total numeric(8,2) NOT NULL,
    estado character varying(255) NOT NULL,
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone
);


ALTER TABLE public.pedidos OWNER TO postgres;

--
-- TOC entry 227 (class 1259 OID 43437)
-- Name: pedidos_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.pedidos_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER SEQUENCE public.pedidos_id_seq OWNER TO postgres;

--
-- TOC entry 4956 (class 0 OID 0)
-- Dependencies: 227
-- Name: pedidos_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.pedidos_id_seq OWNED BY public.pedidos.id;


--
-- TOC entry 223 (class 1259 OID 43403)
-- Name: personal_access_tokens; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.personal_access_tokens (
    id bigint NOT NULL,
    tokenable_type character varying(255) NOT NULL,
    tokenable_id bigint NOT NULL,
    name character varying(255) NOT NULL,
    token character varying(64) NOT NULL,
    abilities text,
    last_used_at timestamp(0) without time zone,
    expires_at timestamp(0) without time zone,
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone
);


ALTER TABLE public.personal_access_tokens OWNER TO postgres;

--
-- TOC entry 222 (class 1259 OID 43402)
-- Name: personal_access_tokens_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.personal_access_tokens_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER SEQUENCE public.personal_access_tokens_id_seq OWNER TO postgres;

--
-- TOC entry 4957 (class 0 OID 0)
-- Dependencies: 222
-- Name: personal_access_tokens_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.personal_access_tokens_id_seq OWNED BY public.personal_access_tokens.id;


--
-- TOC entry 232 (class 1259 OID 43457)
-- Name: pizzas; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.pizzas (
    id bigint NOT NULL,
    nombre character varying(255) NOT NULL,
    precio numeric(8,2) NOT NULL,
    imagen_url character varying(255) NOT NULL,
    descripcion character varying(255) NOT NULL,
    tamano character varying(255) NOT NULL,
    categoria_id bigint NOT NULL,
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone
);


ALTER TABLE public.pizzas OWNER TO postgres;

--
-- TOC entry 231 (class 1259 OID 43456)
-- Name: pizzas_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.pizzas_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER SEQUENCE public.pizzas_id_seq OWNER TO postgres;

--
-- TOC entry 4958 (class 0 OID 0)
-- Dependencies: 231
-- Name: pizzas_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.pizzas_id_seq OWNED BY public.pizzas.id;


--
-- TOC entry 224 (class 1259 OID 43414)
-- Name: sessions; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.sessions (
    id character varying(255) NOT NULL,
    user_id bigint,
    ip_address character varying(45),
    user_agent text,
    payload text NOT NULL,
    last_activity integer NOT NULL
);


ALTER TABLE public.sessions OWNER TO postgres;

--
-- TOC entry 218 (class 1259 OID 43372)
-- Name: users; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.users (
    id bigint NOT NULL,
    name character varying(255) NOT NULL,
    email character varying(255) NOT NULL,
    email_verified_at timestamp(0) without time zone,
    password character varying(255) NOT NULL,
    remember_token character varying(100),
    current_team_id bigint,
    profile_photo_path character varying(2048),
    is_admin boolean DEFAULT false NOT NULL,
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone,
    two_factor_secret text,
    two_factor_recovery_codes text,
    two_factor_confirmed_at timestamp(0) without time zone
);


ALTER TABLE public.users OWNER TO postgres;

--
-- TOC entry 217 (class 1259 OID 43371)
-- Name: users_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.users_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER SEQUENCE public.users_id_seq OWNER TO postgres;

--
-- TOC entry 4959 (class 0 OID 0)
-- Dependencies: 217
-- Name: users_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.users_id_seq OWNED BY public.users.id;


--
-- TOC entry 4744 (class 2604 OID 43453)
-- Name: categorias id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.categorias ALTER COLUMN id SET DEFAULT nextval('public.categorias_id_seq'::regclass);


--
-- TOC entry 4742 (class 2604 OID 43427)
-- Name: clientes id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.clientes ALTER COLUMN id SET DEFAULT nextval('public.clientes_id_seq'::regclass);


--
-- TOC entry 4746 (class 2604 OID 43474)
-- Name: detalle_pedidos id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.detalle_pedidos ALTER COLUMN id SET DEFAULT nextval('public.detalle_pedidos_id_seq'::regclass);


--
-- TOC entry 4739 (class 2604 OID 43394)
-- Name: failed_jobs id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.failed_jobs ALTER COLUMN id SET DEFAULT nextval('public.failed_jobs_id_seq'::regclass);


--
-- TOC entry 4736 (class 2604 OID 25236)
-- Name: migrations id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.migrations ALTER COLUMN id SET DEFAULT nextval('public.migrations_id_seq'::regclass);


--
-- TOC entry 4743 (class 2604 OID 43441)
-- Name: pedidos id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.pedidos ALTER COLUMN id SET DEFAULT nextval('public.pedidos_id_seq'::regclass);


--
-- TOC entry 4741 (class 2604 OID 43406)
-- Name: personal_access_tokens id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.personal_access_tokens ALTER COLUMN id SET DEFAULT nextval('public.personal_access_tokens_id_seq'::regclass);


--
-- TOC entry 4745 (class 2604 OID 43460)
-- Name: pizzas id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.pizzas ALTER COLUMN id SET DEFAULT nextval('public.pizzas_id_seq'::regclass);


--
-- TOC entry 4737 (class 2604 OID 43375)
-- Name: users id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.users ALTER COLUMN id SET DEFAULT nextval('public.users_id_seq'::regclass);


--
-- TOC entry 4941 (class 0 OID 43450)
-- Dependencies: 230
-- Data for Name: categorias; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.categorias (id, nombre, created_at, updated_at) FROM stdin;
1	Pizzas Premium	2023-12-06 03:36:30	2023-12-06 03:36:30
2	Pizzas Normales	2023-12-06 03:36:30	2023-12-06 03:36:30
\.


--
-- TOC entry 4937 (class 0 OID 43424)
-- Dependencies: 226
-- Data for Name: clientes; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.clientes (id, user_id, "numeroTelf", direccion, created_at, updated_at) FROM stdin;
\.


--
-- TOC entry 4945 (class 0 OID 43471)
-- Dependencies: 234
-- Data for Name: detalle_pedidos; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.detalle_pedidos (id, pedido_id, pizza_id, cantidad, subtotal, created_at, updated_at) FROM stdin;
\.


--
-- TOC entry 4932 (class 0 OID 43391)
-- Dependencies: 221
-- Data for Name: failed_jobs; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.failed_jobs (id, uuid, connection, queue, payload, exception, failed_at) FROM stdin;
\.


--
-- TOC entry 4927 (class 0 OID 25233)
-- Dependencies: 216
-- Data for Name: migrations; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.migrations (id, migration, batch) FROM stdin;
35	2014_10_12_000000_create_users_table	1
36	2014_10_12_100000_create_password_reset_tokens_table	1
37	2014_10_12_200000_add_two_factor_columns_to_users_table	1
38	2019_08_19_000000_create_failed_jobs_table	1
39	2019_12_14_000001_create_personal_access_tokens_table	1
40	2023_11_07_022139_create_sessions_table	1
41	2023_12_06_022708_create_clientes_table	1
42	2023_12_06_023026_create_pedidos_table	1
43	2023_12_06_023027_create_categorias_table	1
44	2023_12_06_023028_create_pizzas_table	1
45	2023_12_06_023734_create_detalle_pedidos_table	1
\.


--
-- TOC entry 4930 (class 0 OID 43383)
-- Dependencies: 219
-- Data for Name: password_reset_tokens; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.password_reset_tokens (email, token, created_at) FROM stdin;
\.


--
-- TOC entry 4939 (class 0 OID 43438)
-- Dependencies: 228
-- Data for Name: pedidos; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.pedidos (id, cliente_id, total, estado, created_at, updated_at) FROM stdin;
\.


--
-- TOC entry 4934 (class 0 OID 43403)
-- Dependencies: 223
-- Data for Name: personal_access_tokens; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.personal_access_tokens (id, tokenable_type, tokenable_id, name, token, abilities, last_used_at, expires_at, created_at, updated_at) FROM stdin;
\.


--
-- TOC entry 4943 (class 0 OID 43457)
-- Dependencies: 232
-- Data for Name: pizzas; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.pizzas (id, nombre, precio, imagen_url, descripcion, tamano, categoria_id, created_at, updated_at) FROM stdin;
1	CHESSEBURGER - GRANDE	56.00	https://.jpg	CARNE MOLIDA, TOCINO Y CHEDDAR.	Grande	1	2023-12-06 03:36:30	2023-12-06 03:36:30
2	CHESSEBURGER - PEQUEÑA	32.00	https://.jpg	CARNE MOLIDA, TOCINO Y CHEDDAR.	Pequeña	1	2023-12-06 03:36:30	2023-12-06 03:36:30
3	4 QUESOS - GRANDE	56.00	https://.jpg	MOZZARELLA, CHEDDAR, REQUESÓN Y ROQUEFORT.	Grande	1	2023-12-06 03:36:30	2023-12-06 03:36:30
4	4 QUESOS - PEQUEÑA	32.00	https://.jpg	MOZZARELLA, CHEDDAR, REQUESÓN Y ROQUEFORT.	Pequeña	1	2023-12-06 03:36:30	2023-12-06 03:36:30
5	STROGONOFF - GRANDE	54.00	https://.jpg	POLLO, JAMÓN, PAPAS FRITAS Y MOZZARELLA.	Grande	1	2023-12-06 03:36:30	2023-12-06 03:36:30
6	STROGONOFF - PEQUEÑA	30.00	https://.jpg	POLLO, JAMÓN, PAPAS FRITAS Y MOZZARELLA.	Pequeña	1	2023-12-06 03:36:30	2023-12-06 03:36:30
7	CARNIVORA - GRANDE	54.00	https://.jpg	CARNE MOLIDA, JAMÓN, CHOCLO Y CHEDDAR.	Grande	1	2023-12-06 03:36:30	2023-12-06 03:36:30
8	CARNIVORA - PEQUEÑA	30.00	https://.jpg	CARNE MOLIDA, JAMÓN, CHOCLO Y CHEDDAR.	Pequeña	1	2023-12-06 03:36:30	2023-12-06 03:36:30
9	PERNIL - GRANDE	52.00	https://.jpg	PERNIL DE CERDO, PIMENTÓN, CHOCLO Y MOZZARELLA.	Grande	1	2023-12-06 03:36:30	2023-12-06 03:36:30
10	PERNIL - PEQUEÑA	28.00	https://.jpg	PERNIL DE CERDO, PIMENTÓN, CHOCLO Y MOZZARELLA.	Pequeña	1	2023-12-06 03:36:30	2023-12-06 03:36:30
11	3 QUESOS - GRANDE	50.00	https://.jpg	MOZZARELLA, CHEDDAR Y REQUESÓN.	Grande	1	2023-12-06 03:36:30	2023-12-06 03:36:30
12	3 QUESOS - PEQUEÑA	28.00	https://.jpg	MOZZARELLA, CHEDDAR Y REQUESÓN.	Pequeña	1	2023-12-06 03:36:30	2023-12-06 03:36:30
13	CALABRESA - GRANDE	48.00	https://.jpg	CALABRESA, MOZZARELLA, CHOCLO O ACEITUNAS.	Grande	2	2023-12-06 03:36:30	2023-12-06 03:36:30
14	CALABRESA - PEQUEÑA	26.00	https://.jpg	CALABRESA, MOZZARELLA, CHOCLO O ACEITUNAS.	Pequeña	2	2023-12-06 03:36:30	2023-12-06 03:36:30
15	AMERICANA - GRANDE	48.00	https://.jpg	HUEVO, TOCINO Y MOZZARELLA.	Grande	2	2023-12-06 03:36:30	2023-12-06 03:36:30
16	AMERICANA - PEQUEÑA	26.00	https://.jpg	HUEVO, TOCINO Y MOZZARELLA.	Pequeña	2	2023-12-06 03:36:30	2023-12-06 03:36:30
17	PEPERONI - GRANDE	48.00	https://.jpg	PEPERONI Y MOZZARELLA.	Grande	2	2023-12-06 03:36:30	2023-12-06 03:36:30
18	PEPERONI - PEQUEÑA	26.00	https://.jpg	PEPERONI Y MOZZARELLA.	Pequeña	2	2023-12-06 03:36:30	2023-12-06 03:36:30
19	VEGETARIANA - GRANDE	48.00	https://.jpg	TOMATE, CHAMPIÑONES, PIMENTÓN, CHOCLO Y MOZZARELLA.	Grande	2	2023-12-06 03:36:30	2023-12-06 03:36:30
20	VEGETARIANA - PEQUEÑA	26.00	https://.jpg	TOMATE, CHAMPIÑONES, PIMENTÓN, CHOCLO Y MOZZARELLA.	Pequeña	2	2023-12-06 03:36:30	2023-12-06 03:36:30
21	HAWAIANA - GRANDE	46.00	https://.jpg	JAMÓN, PIÑA Y MOZZARELLA.	Grande	2	2023-12-06 03:36:30	2023-12-06 03:36:30
22	HAWAIANA - PEQUEÑA	24.00	https://.jpg	JAMÓN, PIÑA Y MOZZARELLA.	Pequeña	2	2023-12-06 03:36:30	2023-12-06 03:36:30
23	CLÁSICA - GRANDE	44.00	https://.jpg	JAMÓN, CHOCLO Y MOZZARELLA.	Grande	2	2023-12-06 03:36:30	2023-12-06 03:36:30
24	CLÁSICA - PEQUEÑA	24.00	https://.jpg	JAMÓN, CHOCLO Y MOZZARELLA.	Pequeña	2	2023-12-06 03:36:30	2023-12-06 03:36:30
25	MARGARITA - GRANDE	40.00	https://.jpg	TOMATE Y MOZZARELLA.	Grande	2	2023-12-06 03:36:30	2023-12-06 03:36:30
26	MARGARITA - PEQUEÑA	22.00	https://.jpg	TOMATE Y MOZZARELLA.	Pequeña	2	2023-12-06 03:36:30	2023-12-06 03:36:30
27	ECONÓMICA - GRANDE	38.00	https://.jpg	MOZZARELLA Y ORÉGANO.	Grande	2	2023-12-06 03:36:30	2023-12-06 03:36:30
28	ECONÓMICA - PEQUEÑA	22.00	https://.jpg	MOZZARELLA Y ORÉGANO.	Pequeña	2	2023-12-06 03:36:30	2023-12-06 03:36:30
\.


--
-- TOC entry 4935 (class 0 OID 43414)
-- Dependencies: 224
-- Data for Name: sessions; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.sessions (id, user_id, ip_address, user_agent, payload, last_activity) FROM stdin;
\.


--
-- TOC entry 4929 (class 0 OID 43372)
-- Dependencies: 218
-- Data for Name: users; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.users (id, name, email, email_verified_at, password, remember_token, current_team_id, profile_photo_path, is_admin, created_at, updated_at, two_factor_secret, two_factor_recovery_codes, two_factor_confirmed_at) FROM stdin;
\.


--
-- TOC entry 4960 (class 0 OID 0)
-- Dependencies: 229
-- Name: categorias_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.categorias_id_seq', 2, true);


--
-- TOC entry 4961 (class 0 OID 0)
-- Dependencies: 225
-- Name: clientes_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.clientes_id_seq', 1, false);


--
-- TOC entry 4962 (class 0 OID 0)
-- Dependencies: 233
-- Name: detalle_pedidos_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.detalle_pedidos_id_seq', 1, false);


--
-- TOC entry 4963 (class 0 OID 0)
-- Dependencies: 220
-- Name: failed_jobs_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.failed_jobs_id_seq', 1, false);


--
-- TOC entry 4964 (class 0 OID 0)
-- Dependencies: 215
-- Name: migrations_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.migrations_id_seq', 45, true);


--
-- TOC entry 4965 (class 0 OID 0)
-- Dependencies: 227
-- Name: pedidos_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.pedidos_id_seq', 1, false);


--
-- TOC entry 4966 (class 0 OID 0)
-- Dependencies: 222
-- Name: personal_access_tokens_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.personal_access_tokens_id_seq', 1, false);


--
-- TOC entry 4967 (class 0 OID 0)
-- Dependencies: 231
-- Name: pizzas_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.pizzas_id_seq', 28, true);


--
-- TOC entry 4968 (class 0 OID 0)
-- Dependencies: 217
-- Name: users_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.users_id_seq', 1, false);


--
-- TOC entry 4773 (class 2606 OID 43455)
-- Name: categorias categorias_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.categorias
    ADD CONSTRAINT categorias_pkey PRIMARY KEY (id);


--
-- TOC entry 4769 (class 2606 OID 43431)
-- Name: clientes clientes_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.clientes
    ADD CONSTRAINT clientes_pkey PRIMARY KEY (id);


--
-- TOC entry 4777 (class 2606 OID 43476)
-- Name: detalle_pedidos detalle_pedidos_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.detalle_pedidos
    ADD CONSTRAINT detalle_pedidos_pkey PRIMARY KEY (id);


--
-- TOC entry 4756 (class 2606 OID 43399)
-- Name: failed_jobs failed_jobs_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.failed_jobs
    ADD CONSTRAINT failed_jobs_pkey PRIMARY KEY (id);


--
-- TOC entry 4758 (class 2606 OID 43401)
-- Name: failed_jobs failed_jobs_uuid_unique; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.failed_jobs
    ADD CONSTRAINT failed_jobs_uuid_unique UNIQUE (uuid);


--
-- TOC entry 4748 (class 2606 OID 25238)
-- Name: migrations migrations_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.migrations
    ADD CONSTRAINT migrations_pkey PRIMARY KEY (id);


--
-- TOC entry 4754 (class 2606 OID 43389)
-- Name: password_reset_tokens password_reset_tokens_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.password_reset_tokens
    ADD CONSTRAINT password_reset_tokens_pkey PRIMARY KEY (email);


--
-- TOC entry 4771 (class 2606 OID 43443)
-- Name: pedidos pedidos_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.pedidos
    ADD CONSTRAINT pedidos_pkey PRIMARY KEY (id);


--
-- TOC entry 4760 (class 2606 OID 43410)
-- Name: personal_access_tokens personal_access_tokens_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.personal_access_tokens
    ADD CONSTRAINT personal_access_tokens_pkey PRIMARY KEY (id);


--
-- TOC entry 4762 (class 2606 OID 43413)
-- Name: personal_access_tokens personal_access_tokens_token_unique; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.personal_access_tokens
    ADD CONSTRAINT personal_access_tokens_token_unique UNIQUE (token);


--
-- TOC entry 4775 (class 2606 OID 43464)
-- Name: pizzas pizzas_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.pizzas
    ADD CONSTRAINT pizzas_pkey PRIMARY KEY (id);


--
-- TOC entry 4766 (class 2606 OID 43420)
-- Name: sessions sessions_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.sessions
    ADD CONSTRAINT sessions_pkey PRIMARY KEY (id);


--
-- TOC entry 4750 (class 2606 OID 43382)
-- Name: users users_email_unique; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.users
    ADD CONSTRAINT users_email_unique UNIQUE (email);


--
-- TOC entry 4752 (class 2606 OID 43380)
-- Name: users users_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.users
    ADD CONSTRAINT users_pkey PRIMARY KEY (id);


--
-- TOC entry 4763 (class 1259 OID 43411)
-- Name: personal_access_tokens_tokenable_type_tokenable_id_index; Type: INDEX; Schema: public; Owner: postgres
--

CREATE INDEX personal_access_tokens_tokenable_type_tokenable_id_index ON public.personal_access_tokens USING btree (tokenable_type, tokenable_id);


--
-- TOC entry 4764 (class 1259 OID 43422)
-- Name: sessions_last_activity_index; Type: INDEX; Schema: public; Owner: postgres
--

CREATE INDEX sessions_last_activity_index ON public.sessions USING btree (last_activity);


--
-- TOC entry 4767 (class 1259 OID 43421)
-- Name: sessions_user_id_index; Type: INDEX; Schema: public; Owner: postgres
--

CREATE INDEX sessions_user_id_index ON public.sessions USING btree (user_id);


--
-- TOC entry 4778 (class 2606 OID 43432)
-- Name: clientes clientes_user_id_foreign; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.clientes
    ADD CONSTRAINT clientes_user_id_foreign FOREIGN KEY (user_id) REFERENCES public.users(id);


--
-- TOC entry 4781 (class 2606 OID 43477)
-- Name: detalle_pedidos detalle_pedidos_pedido_id_foreign; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.detalle_pedidos
    ADD CONSTRAINT detalle_pedidos_pedido_id_foreign FOREIGN KEY (pedido_id) REFERENCES public.pedidos(id);


--
-- TOC entry 4782 (class 2606 OID 43482)
-- Name: detalle_pedidos detalle_pedidos_pizza_id_foreign; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.detalle_pedidos
    ADD CONSTRAINT detalle_pedidos_pizza_id_foreign FOREIGN KEY (pizza_id) REFERENCES public.pizzas(id);


--
-- TOC entry 4779 (class 2606 OID 43444)
-- Name: pedidos pedidos_cliente_id_foreign; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.pedidos
    ADD CONSTRAINT pedidos_cliente_id_foreign FOREIGN KEY (cliente_id) REFERENCES public.clientes(id);


--
-- TOC entry 4780 (class 2606 OID 43465)
-- Name: pizzas pizzas_categoria_id_foreign; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.pizzas
    ADD CONSTRAINT pizzas_categoria_id_foreign FOREIGN KEY (categoria_id) REFERENCES public.categorias(id);


-- Completed on 2023-12-06 00:08:23

--
-- PostgreSQL database dump complete
--

