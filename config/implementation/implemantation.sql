-- Table: public.categorie

DROP TABLE public.categorie;
DROP TABLE public.departement;
DROP TABLE public.lieu;
DROP TABLE public.mot_cle;
DROP TABLE public.possede_mc;
DROP TABLE public.pseudo;
DROP TABLE public.region;
DROP TABLE public.ville;



CREATE TABLE public.categorie
(
  idcat integer NOT NULL DEFAULT nextval('catergorie_idcat_seq'::regclass),
  nomcat character varying(30) NOT NULL,
  descat character varying(200),
  CONSTRAINT catergorie_pkey PRIMARY KEY (idcat)
)
WITH (
  OIDS=FALSE
);
ALTER TABLE public.categorie
  OWNER TO xdydxxxhgjytuj;



CREATE TABLE public.departement
(
  iddep integer NOT NULL DEFAULT nextval('departement_iddep_seq'::regclass),
  nomdep character varying(50),
  numerodep character varying(3),
  idregion integer,
  CONSTRAINT departement_pkey PRIMARY KEY (iddep),
  CONSTRAINT departement_idregion_fkey FOREIGN KEY (idregion)
      REFERENCES public.region (idregion) MATCH SIMPLE
      ON UPDATE NO ACTION ON DELETE NO ACTION
)
WITH (
  OIDS=FALSE
);
ALTER TABLE public.departement
  OWNER TO xdydxxxhgjytuj;


CREATE TABLE public.lieu
(
  idlieu integer NOT NULL DEFAULT nextval('lieu_idlieu_seq'::regclass),
  nomlieu character varying(50) NOT NULL,
  urllieu character varying(300),
  deslieu character varying(500),
  adrlieu character varying(50),
  idville integer,
  idcat integer,
  idpseudo integer,
  CONSTRAINT lieu_pkey PRIMARY KEY (idlieu),
  CONSTRAINT lieu_idcat_fkey FOREIGN KEY (idcat)
      REFERENCES public.categorie (idcat) MATCH SIMPLE
      ON UPDATE NO ACTION ON DELETE NO ACTION,
  CONSTRAINT lieu_idpseudo_fkey FOREIGN KEY (idpseudo)
      REFERENCES public.pseudo (idpseudo) MATCH SIMPLE
      ON UPDATE NO ACTION ON DELETE NO ACTION,
  CONSTRAINT lieu_idville_fkey FOREIGN KEY (idville)
      REFERENCES public.ville (idville) MATCH SIMPLE
      ON UPDATE NO ACTION ON DELETE NO ACTION
)
WITH (
  OIDS=FALSE
);
ALTER TABLE public.lieu
  OWNER TO xdydxxxhgjytuj;



CREATE TABLE public.mot_cle
(
  idmotcle integer NOT NULL DEFAULT nextval('mot_cle_idmotcle_seq'::regclass),
  libmotcle character varying(20),
  CONSTRAINT mot_cle_pkey PRIMARY KEY (idmotcle)
)
WITH (
  OIDS=FALSE
);
ALTER TABLE public.mot_cle
  OWNER TO xdydxxxhgjytuj;



CREATE TABLE public.possede_mc
(
  idlieu integer,
  idmotcle integer,
  CONSTRAINT possede_mc_idlieu_fkey FOREIGN KEY (idlieu)
      REFERENCES public.lieu (idlieu) MATCH SIMPLE
      ON UPDATE NO ACTION ON DELETE NO ACTION,
  CONSTRAINT possede_mc_idmotcle_fkey FOREIGN KEY (idmotcle)
      REFERENCES public.mot_cle (idmotcle) MATCH SIMPLE
      ON UPDATE NO ACTION ON DELETE NO ACTION
)
WITH (
  OIDS=FALSE
);
ALTER TABLE public.possede_mc
  OWNER TO xdydxxxhgjytuj;



CREATE TABLE public.pseudo
(
  idpseudo integer NOT NULL DEFAULT nextval('pseudo_idpseudo_seq'::regclass),
  pseudo character varying(50),
  CONSTRAINT pseudo_pkey PRIMARY KEY (idpseudo)
)
WITH (
  OIDS=FALSE
);
ALTER TABLE public.pseudo
  OWNER TO xdydxxxhgjytuj;



CREATE TABLE public.region
(
  idregion integer NOT NULL DEFAULT nextval('region_idregion_seq'::regclass),
  nomregion character varying(100),
  CONSTRAINT region_pkey PRIMARY KEY (idregion)
)
WITH (
  OIDS=FALSE
);
ALTER TABLE public.region
  OWNER TO xdydxxxhgjytuj;




CREATE TABLE public.ville
(
  idville integer NOT NULL DEFAULT nextval('ville_idville_seq'::regclass),
  nomville character varying(50) NOT NULL,
  cpville character varying(5) NOT NULL,
  iddep integer,
  CONSTRAINT ville_pkey PRIMARY KEY (idville),
  CONSTRAINT ville_iddep_fkey FOREIGN KEY (iddep)
      REFERENCES public.departement (iddep) MATCH SIMPLE
      ON UPDATE NO ACTION ON DELETE NO ACTION
)
WITH (
  OIDS=FALSE
);
ALTER TABLE public.ville
  OWNER TO xdydxxxhgjytuj;


