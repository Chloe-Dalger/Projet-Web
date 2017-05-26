-- Table: public.categorie

DROP TABLE categorie;
DROP TABLE departement;
DROP TABLE lieu;
DROP TABLE mot_cle;
DROP TABLE possede_mc;
DROP TABLE pseudo;
DROP TABLE region;
DROP TABLE ville;



CREATE TABLE categorie
(
  idcat SERIAL NOT NULL,
  nomcat varchar(30) NOT NULL,
  descat varchar(200),
  CONSTRAINT catergorie_pkey PRIMARY KEY (idcat)
);


CREATE TABLE departement
(
  iddep SERIAL NOT NULL,
  nomdep varchar(50),
  numerodep varchar(2),
  idregion integer,
  CONSTRAINT departement_pkey PRIMARY KEY (iddep),
  CONSTRAINT departement_idregion_fkey FOREIGN KEY (idregion)
      REFERENCES public.region (idregion)
);

CREATE TABLE lieu
(
  idlieu SERIAL NOT NULL,
  nomlieu varchar(50) NOT NULL,
  urllieu varchar(300),
  deslieu varchar(700),
  adrlieu varchar(100),
  idville integer,
  idcat integer,
  idpseudo integer,
  CONSTRAINT lieu_pkey PRIMARY KEY (idlieu),
  CONSTRAINT lieu_idcat_fkey FOREIGN KEY (idcat)
      REFERENCES public.categorie (idcat),
  CONSTRAINT lieu_idpseudo_fkey FOREIGN KEY (idpseudo)
      REFERENCES public.pseudo (idpseudo),
  CONSTRAINT lieu_idville_fkey FOREIGN KEY (idville)
      REFERENCES public.ville (idville)
);


CREATE TABLE mot_cle
(
  idmotcle SERIAL NOT NULL,
  libmotcle varchar(20),
  CONSTRAINT mot_cle_pkey PRIMARY KEY (idmotcle)
);



CREATE TABLE possede_mc
(
  idlieu integer,
  idmotcle integer,
  CONSTRAINT possede_mc_idlieu_fkey FOREIGN KEY (idlieu)
      REFERENCES public.lieu (idlieu),
  CONSTRAINT possede_mc_idmotcle_fkey FOREIGN KEY (idmotcle)
      REFERENCES public.mot_cle (idmotcle)
);



CREATE TABLE pseudo
(
  idpseudo SERIAL NOT NULL,
  pseudo varchar(50),
  CONSTRAINT pseudo_pkey PRIMARY KEY (idpseudo)
);



CREATE TABLE region
(
  idregion SERIAL NOT NULL,
  nomregion varchar(100),
  CONSTRAINT region_pkey PRIMARY KEY (idregion)
);




CREATE TABLE ville
(
  idville SERIAL NOT NULL,
  nomville varchar(50) NOT NULL,
  cpville varchar(5) NOT NULL,
  iddep integer,
  CONSTRAINT ville_pkey PRIMARY KEY (idville),
  CONSTRAINT ville_iddep_fkey FOREIGN KEY (iddep)
      REFERENCES public.departement (iddep)
);
