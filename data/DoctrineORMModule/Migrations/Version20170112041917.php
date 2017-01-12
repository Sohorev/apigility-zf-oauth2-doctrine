<?php

namespace DoctrineORMModule\Migrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Создание таблиц под oauth с учетом mutatables
 */
class Version20170112041917 extends AbstractMigration
{
    /**
     * @param Schema $schema
     */
    public function up(Schema $schema)
    {
        $this->addSql('CREATE SEQUENCE accesstoken_oauth2_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;');
        $this->addSql('CREATE SEQUENCE authorizationcode_oauth2_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;');
        $this->addSql('CREATE SEQUENCE client_oauth2_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;');
        $this->addSql('CREATE SEQUENCE jti_oauth2_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;');
        $this->addSql('CREATE SEQUENCE jwt_oauth2_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;');
        $this->addSql('CREATE TABLE oauth2_accesstoken (
    id integer NOT NULL,
    client_id integer NOT NULL,
    user_id integer,
    accesstoken text,
    expires timestamp(0) without time zone DEFAULT NULL::timestamp without time zone
);');
        $this->addSql('CREATE TABLE oauth2_accesstoken_to_scope (
    scope_id integer NOT NULL,
    accesstoken_id integer NOT NULL
);');
        $this->addSql('CREATE TABLE oauth2_authorizationcode (
    id integer NOT NULL,
    client_id integer NOT NULL,
    user_id integer,
    authorizationcode character varying(255) DEFAULT NULL::character varying,
    redirecturi text,
    expires timestamp(0) without time zone DEFAULT NULL::timestamp without time zone,
    idtoken text
);');
        $this->addSql('CREATE TABLE oauth2_authorizationcode_to_scope (
    scope_id integer NOT NULL,
    authorizationcode_id integer NOT NULL
);');
        $this->addSql('CREATE TABLE oauth2_client (
    id integer NOT NULL,
    user_id integer,
    clientid character varying(255) DEFAULT NULL::character varying,
    secret character varying(255) DEFAULT NULL::character varying,
    redirecturi text,
    granttype text
);');
        $this->addSql('CREATE TABLE oauth2_client_to_scope (
    scope_id integer NOT NULL,
    client_id integer NOT NULL
);');
        $this->addSql('CREATE TABLE oauth2_jti (
    id integer NOT NULL,
    client_id integer NOT NULL,
    subject character varying(255) DEFAULT NULL::character varying,
    audience character varying(255) DEFAULT NULL::character varying,
    expires timestamp(0) without time zone DEFAULT NULL::timestamp without time zone,
    jti text
);');
        $this->addSql('CREATE TABLE oauth2_jwt (
    id integer NOT NULL,
    client_id integer NOT NULL,
    subject character varying(255) DEFAULT NULL::character varying,
    publickey text
);');
        $this->addSql('CREATE TABLE oauth2_publickey (
    id integer NOT NULL,
    client_id integer NOT NULL,
    publickey text,
    privatekey text,
    encryptionalgorithm character varying(255) DEFAULT NULL::character varying
);');
        $this->addSql('CREATE TABLE oauth2_refreshtoken (
    id integer NOT NULL,
    client_id integer NOT NULL,
    user_id integer,
    refreshtoken character varying(255) DEFAULT NULL::character varying,
    expires timestamp(0) without time zone DEFAULT NULL::timestamp without time zone
);');
        $this->addSql('CREATE TABLE oauth2_refreshtoken_to_scope (
    scope_id integer NOT NULL,
    refreshtoken_id integer NOT NULL
);');
        $this->addSql('CREATE TABLE oauth2_scope (
    id integer NOT NULL,
    scope text,
    isdefault boolean
);');
        $this->addSql('CREATE SEQUENCE publickey_oauth2_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;');
        $this->addSql('CREATE SEQUENCE refreshtoken_oauth2_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;');
        $this->addSql('CREATE SEQUENCE scope_oauth2_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;');
        $this->addSql('CREATE TABLE users
(
  id serial NOT NULL,
  username character varying(120) NOT NULL,
  password character varying(60) NOT NULL,
  blocked integer NOT NULL,
  firstname character varying(200) DEFAULT NULL::character varying,
  lastname character varying(200) DEFAULT NULL::character varying,
  token character varying(100) DEFAULT NULL::character varying,
  CONSTRAINT users_pkey PRIMARY KEY (id)
)
WITH (
  OIDS=FALSE
);');
        $this->addSql("INSERT INTO oauth2_client (id, user_id, clientid, secret, redirecturi, granttype) VALUES (1, NULL, 'testclient', '" . '$2y$14$Fl9zez8UX69YGFhQW4bxaetp1KdKryuFhiy23CcGlQnNeQAk5UPKe' . "', NULL, NULL);");
        $this->addSql("INSERT INTO users (id, username, password, blocked, firstname, lastname, token) VALUES (2, 'testuser', '" . '$2y$14$Fl9zez8UX69YGFhQW4bxaetp1KdKryuFhiy23CcGlQnNeQAk5UPKe' . "', 0, NULL, NULL, NULL);");
        $this->addSql('ALTER TABLE ONLY oauth2_accesstoken
    ADD CONSTRAINT oauth2_accesstoken_pkey PRIMARY KEY (id);');
        $this->addSql('ALTER TABLE ONLY oauth2_accesstoken_to_scope
    ADD CONSTRAINT oauth2_accesstoken_to_scope_pkey PRIMARY KEY (scope_id, accesstoken_id);');
        $this->addSql('ALTER TABLE ONLY oauth2_authorizationcode
    ADD CONSTRAINT oauth2_authorizationcode_pkey PRIMARY KEY (id);');
        $this->addSql('ALTER TABLE ONLY oauth2_authorizationcode_to_scope
    ADD CONSTRAINT oauth2_authorizationcode_to_scope_pkey PRIMARY KEY (scope_id, authorizationcode_id);');
        $this->addSql('ALTER TABLE ONLY oauth2_client
    ADD CONSTRAINT oauth2_client_pkey PRIMARY KEY (id);');
        $this->addSql('ALTER TABLE ONLY oauth2_client_to_scope
    ADD CONSTRAINT oauth2_client_to_scope_pkey PRIMARY KEY (scope_id, client_id);');
        $this->addSql('ALTER TABLE ONLY oauth2_jti
    ADD CONSTRAINT oauth2_jti_pkey PRIMARY KEY (id);');
        $this->addSql('ALTER TABLE ONLY oauth2_jwt
    ADD CONSTRAINT oauth2_jwt_pkey PRIMARY KEY (id);');
        $this->addSql('ALTER TABLE ONLY oauth2_publickey
    ADD CONSTRAINT oauth2_publickey_pkey PRIMARY KEY (id);');
        $this->addSql('ALTER TABLE ONLY oauth2_refreshtoken
    ADD CONSTRAINT oauth2_refreshtoken_pkey PRIMARY KEY (id);');
        $this->addSql('ALTER TABLE ONLY oauth2_refreshtoken_to_scope
    ADD CONSTRAINT oauth2_refreshtoken_to_scope_pkey PRIMARY KEY (scope_id, refreshtoken_id);');
        $this->addSql('ALTER TABLE ONLY oauth2_scope
    ADD CONSTRAINT oauth2_scope_pkey PRIMARY KEY (id);');
        $this->addSql('CREATE INDEX idx_163e716319eb6921 ON oauth2_client_to_scope USING btree (client_id);');
        $this->addSql('CREATE INDEX idx_163e7163682b5931 ON oauth2_client_to_scope USING btree (scope_id);');
        $this->addSql('CREATE INDEX idx_496b8749682b5931 ON oauth2_authorizationcode_to_scope USING btree (scope_id);');
        $this->addSql('CREATE INDEX idx_496b8749c3653ff6 ON oauth2_authorizationcode_to_scope USING btree (authorizationcode_id);');
        $this->addSql('CREATE INDEX idx_5b5d887919eb6921 ON oauth2_refreshtoken USING btree (client_id);');
        $this->addSql('CREATE INDEX idx_5b5d8879a76ed395 ON oauth2_refreshtoken USING btree (user_id);');
        $this->addSql('CREATE INDEX idx_669ff9c9a76ed395 ON oauth2_client USING btree (user_id);');
        $this->addSql('CREATE INDEX idx_a2f1e43419eb6921 ON oauth2_accesstoken USING btree (client_id);');
        $this->addSql('CREATE INDEX idx_a2f1e434a76ed395 ON oauth2_accesstoken USING btree (user_id);');
        $this->addSql('CREATE INDEX idx_aa97a46719eb6921 ON oauth2_jwt USING btree (client_id);');
        $this->addSql('CREATE INDEX idx_b2e0441319eb6921 ON oauth2_authorizationcode USING btree (client_id);');
        $this->addSql('CREATE INDEX idx_b2e04413a76ed395 ON oauth2_authorizationcode USING btree (user_id);');
        $this->addSql('CREATE INDEX idx_c7c91a4e682b5931 ON oauth2_accesstoken_to_scope USING btree (scope_id);');
        $this->addSql('CREATE INDEX idx_c7c91a4efdb3dcd1 ON oauth2_accesstoken_to_scope USING btree (accesstoken_id);');
        $this->addSql('CREATE UNIQUE INDEX idx_clientid_unique ON oauth2_client USING btree (clientid);');
        $this->addSql('CREATE INDEX idx_ddc6ba21682b5931 ON oauth2_refreshtoken_to_scope USING btree (scope_id);');
        $this->addSql('CREATE INDEX idx_ddc6ba21e8aa8cfb ON oauth2_refreshtoken_to_scope USING btree (refreshtoken_id);');
        $this->addSql('CREATE INDEX idx_e2bc9b7d19eb6921 ON oauth2_jti USING btree (client_id);');
        $this->addSql('CREATE UNIQUE INDEX uniq_1d7f309119eb6921 ON oauth2_publickey USING btree (client_id);');
        $this->addSql('ALTER TABLE ONLY oauth2_client_to_scope
    ADD CONSTRAINT fk_163e716319eb6921 FOREIGN KEY (client_id) REFERENCES oauth2_client(id) ON DELETE CASCADE;');
        $this->addSql('ALTER TABLE ONLY oauth2_client_to_scope
    ADD CONSTRAINT fk_163e7163682b5931 FOREIGN KEY (scope_id) REFERENCES oauth2_scope(id) ON DELETE CASCADE;');
        $this->addSql('ALTER TABLE ONLY oauth2_publickey
    ADD CONSTRAINT fk_1d7f309119eb6921 FOREIGN KEY (client_id) REFERENCES oauth2_client(id) ON DELETE CASCADE;');
        $this->addSql('ALTER TABLE ONLY oauth2_authorizationcode_to_scope
    ADD CONSTRAINT fk_496b8749682b5931 FOREIGN KEY (scope_id) REFERENCES oauth2_scope(id) ON DELETE CASCADE;');
        $this->addSql('ALTER TABLE ONLY oauth2_authorizationcode_to_scope
    ADD CONSTRAINT fk_496b8749c3653ff6 FOREIGN KEY (authorizationcode_id) REFERENCES oauth2_authorizationcode(id) ON DELETE CASCADE;');
        $this->addSql('ALTER TABLE ONLY oauth2_refreshtoken
    ADD CONSTRAINT fk_5b5d887919eb6921 FOREIGN KEY (client_id) REFERENCES oauth2_client(id) ON DELETE CASCADE;');
        $this->addSql('ALTER TABLE ONLY oauth2_refreshtoken
    ADD CONSTRAINT fk_5b5d8879a76ed395 FOREIGN KEY (user_id) REFERENCES users(id) ON DELETE CASCADE;');
        $this->addSql('ALTER TABLE ONLY oauth2_client
    ADD CONSTRAINT fk_669ff9c9a76ed395 FOREIGN KEY (user_id) REFERENCES users(id) ON DELETE CASCADE;');
        $this->addSql('ALTER TABLE ONLY oauth2_accesstoken
    ADD CONSTRAINT fk_a2f1e43419eb6921 FOREIGN KEY (client_id) REFERENCES oauth2_client(id) ON DELETE CASCADE;');
        $this->addSql('ALTER TABLE ONLY oauth2_accesstoken
    ADD CONSTRAINT fk_a2f1e434a76ed395 FOREIGN KEY (user_id) REFERENCES users(id) ON DELETE CASCADE;');
        $this->addSql('ALTER TABLE ONLY oauth2_jwt
    ADD CONSTRAINT fk_aa97a46719eb6921 FOREIGN KEY (client_id) REFERENCES oauth2_client(id) ON DELETE CASCADE;');
        $this->addSql('ALTER TABLE ONLY oauth2_authorizationcode
    ADD CONSTRAINT fk_b2e0441319eb6921 FOREIGN KEY (client_id) REFERENCES oauth2_client(id) ON DELETE CASCADE;');
        $this->addSql('ALTER TABLE ONLY oauth2_authorizationcode
    ADD CONSTRAINT fk_b2e04413a76ed395 FOREIGN KEY (user_id) REFERENCES users(id) ON DELETE CASCADE;');
        $this->addSql('ALTER TABLE ONLY oauth2_accesstoken_to_scope
    ADD CONSTRAINT fk_c7c91a4e682b5931 FOREIGN KEY (scope_id) REFERENCES oauth2_scope(id) ON DELETE CASCADE;');
        $this->addSql('ALTER TABLE ONLY oauth2_accesstoken_to_scope
    ADD CONSTRAINT fk_c7c91a4efdb3dcd1 FOREIGN KEY (accesstoken_id) REFERENCES oauth2_accesstoken(id) ON DELETE CASCADE;');
        $this->addSql('ALTER TABLE ONLY oauth2_refreshtoken_to_scope
    ADD CONSTRAINT fk_ddc6ba21682b5931 FOREIGN KEY (scope_id) REFERENCES oauth2_scope(id) ON DELETE CASCADE;');
        $this->addSql('ALTER TABLE ONLY oauth2_refreshtoken_to_scope
    ADD CONSTRAINT fk_ddc6ba21e8aa8cfb FOREIGN KEY (refreshtoken_id) REFERENCES oauth2_refreshtoken(id) ON DELETE CASCADE;');
        $this->addSql('ALTER TABLE ONLY oauth2_jti
    ADD CONSTRAINT fk_e2bc9b7d19eb6921 FOREIGN KEY (client_id) REFERENCES oauth2_client(id) ON DELETE CASCADE;');
    }

    /**
     * @param Schema $schema
     */
    public function down(Schema $schema)
    {
        $this->addSql('drop table "oauth2_client" cascade;');
        $this->addSql('drop table "oauth2_accesstoken" cascade;');
        $this->addSql('drop table "oauth2_publickey" cascade;');
        $this->addSql('drop table "oauth2_authorizationcode" cascade;');
        $this->addSql('drop table "oauth2_refreshtoken" cascade;');
        $this->addSql('drop table "oauth2_client_to_scope" cascade;');
        $this->addSql('drop table "oauth2_authorizationcode_to_scope" cascade;');
        $this->addSql('drop table "users" cascade;');
        $this->addSql('drop table "oauth2_accesstoken_to_scope" cascade;');
        $this->addSql('drop table "oauth2_refreshtoken_to_scope" cascade;');
        $this->addSql('drop table "migrations" cascade;');
        $this->addSql('drop table "oauth2_jwt" cascade;');
        $this->addSql('drop table "oauth2_scope" cascade;');
        $this->addSql('drop table "oauth2_jti" cascade;');

        $this->addSql('drop SEQUENCE accesstoken_oauth2_id_seq');
        $this->addSql('drop SEQUENCE authorizationcode_oauth2_id_seq');
        $this->addSql('drop SEQUENCE client_oauth2_id_seq');
        $this->addSql('drop SEQUENCE jti_oauth2_id_seq');
        $this->addSql('drop SEQUENCE jwt_oauth2_id_seq');
        $this->addSql('drop SEQUENCE publickey_oauth2_id_seq');
        $this->addSql('drop SEQUENCE refreshtoken_oauth2_id_seq');
        $this->addSql('drop SEQUENCE scope_oauth2_id_seq');
    }
}
