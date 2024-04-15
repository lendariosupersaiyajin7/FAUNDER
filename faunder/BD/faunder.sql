CREATE DATABASE Faunder;
USE Faunder;
DROP DATABASE Faunder;

/* FANDER LOGICO: */

CREATE TABLE Entusiasta (
    ID_Entusiasta INT AUTO_INCREMENT PRIMARY KEY,
    Nome_Entusiasta VARCHAR(255),
    Apelido_Entusiasta VARCHAR(255),
    Email_Entusiasta VARCHAR(255) UNIQUE,
    Senha_Entusiasta VARCHAR(255),
    DataNasci_Entusiasta DATE
);

CREATE TABLE Especialista (
    ID_Especialista INT AUTO_INCREMENT PRIMARY KEY,
    Nome_Especialista VARCHAR(255),
    Apelido_Especialista VARCHAR(255),
    Email_Especialista VARCHAR(255) UNIQUE,
    Senha_Especialista VARCHAR(255),
    DataNasci_Especialista DATE,
    Comprovante_Especialista VARCHAR(255) UNIQUE
);

CREATE TABLE ADM (
    ID_ADM INT AUTO_INCREMENT PRIMARY KEY,
    Nome_ADM VARCHAR(255),
    Apelido_ADM VARCHAR(255),
    Email_ADM VARCHAR(255) UNIQUE,
    Senha_ADM VARCHAR(255),
    SenhaEpicaSecreta_ADM VARCHAR(255) UNIQUE,
    DataNasci_ADM DATE
);

CREATE TABLE Especie (
    ID_Especie INT AUTO_INCREMENT PRIMARY KEY,
    Nome_Especie VARCHAR(255),
    NomeCientifico_Especie VARCHAR(255) UNIQUE,
    DataDescobrimento_Especie DATE,
    fk_Especialista_ID_Especialista INT
);

CREATE TABLE Encontra (
    fk_Entusiasta_ID_Entusiasta INT,
    fk_Especie_ID_Especie INT
);

CREATE TABLE Monitora (
    fk_Especialista_ID_Especialista INT,
    fk_ADM_ID_ADM INT
);
 
ALTER TABLE Especie ADD CONSTRAINT FK_Especie_2
    FOREIGN KEY (fk_Especialista_ID_Especialista)
    REFERENCES Especialista (ID_Especialista)
    ON DELETE CASCADE;
 
ALTER TABLE Encontra ADD CONSTRAINT FK_Encontra_1
    FOREIGN KEY (fk_Entusiasta_ID_Entusiasta)
    REFERENCES Entusiasta (ID_Entusiasta)
    ON DELETE RESTRICT;
 
ALTER TABLE Encontra ADD CONSTRAINT FK_Encontra_2
    FOREIGN KEY (fk_Especie_ID_Especie)
    REFERENCES Especie (ID_Especie)
    ON DELETE SET NULL;
 
ALTER TABLE Monitora ADD CONSTRAINT FK_Monitora_1
    FOREIGN KEY (fk_Especialista_ID_Especialista)
    REFERENCES Especialista (ID_Especialista)
    ON DELETE RESTRICT;
 
ALTER TABLE Monitora ADD CONSTRAINT FK_Monitora_2
    FOREIGN KEY (fk_ADM_ID_ADM)
    REFERENCES ADM (ID_ADM)
    ON DELETE SET NULL;
    
ALTER TABLE Entusiasta
ADD CONSTRAINT email_unico_entusiasta UNIQUE (Email_Entusiasta);

ALTER TABLE Especialista
ADD CONSTRAINT email_unico_especialista UNIQUE (Email_Especialista);

ALTER TABLE ADM
ADD CONSTRAINT email_unico_adm UNIQUE (Email_ADM);

ALTER TABLE ADM
ADD CONSTRAINT senha_unica_adm UNIQUE (SenhaEpicaSecreta_ADM);
