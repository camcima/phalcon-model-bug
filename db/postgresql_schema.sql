CREATE TABLE orders
(
  id serial NOT NULL,
  hash character(32) NOT NULL,
  order_number integer NOT NULL,
  created_at timestamp without time zone NOT NULL,
  CONSTRAINT orders_pkey PRIMARY KEY (id)
);

CREATE TABLE users
(
  id serial NOT NULL,
  hash character(32) NOT NULL,
  name character varying(100) NOT NULL,
  created_at timestamp without time zone NOT NULL,
  CONSTRAINT users_pkey PRIMARY KEY (id)
);

CREATE TABLE vouchers
(
  id serial NOT NULL,
  hash character(32) NOT NULL,
  code character varying(100) NOT NULL,
  amount real NOT NULL,
  order_id integer,
  user_id integer,
  created_at timestamp without time zone NOT NULL,
  CONSTRAINT vouchers_pkey PRIMARY KEY (id),
  CONSTRAINT vouchers_order_id_fkey FOREIGN KEY (order_id)
      REFERENCES orders (id) MATCH SIMPLE
      ON UPDATE NO ACTION ON DELETE NO ACTION,
  CONSTRAINT vouchers_user_id_fkey FOREIGN KEY (user_id)
      REFERENCES users (id) MATCH SIMPLE
      ON UPDATE NO ACTION ON DELETE NO ACTION
);