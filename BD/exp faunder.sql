CREATE DATABASE EXP;
USE EXP;
DROP database exp;
CREATE TABLE Entusiasta (
    ID_Entusiasta INT AUTO_INCREMENT PRIMARY KEY,
    Nome_Entusiasta VARCHAR(255),
    Apelido_Entusiasta VARCHAR(255),
    Email_Entusiasta VARCHAR(255),
    Senha_Entusiasta VARCHAR(255),
    DataNasci_Entusiasta DATE,
    fk_ADM_ID_ADM INT,
    UNIQUE (Email_Entusiasta)
);

CREATE TABLE Especialista (
    ID_Especialista INT AUTO_INCREMENT PRIMARY KEY,
    Nome_Especialista VARCHAR(255),
    Apelido_Especialista VARCHAR(255),
    Email_Especialista VARCHAR(255),
    Senha_Especialista VARCHAR(255),
    DataNasci_Especialista DATE,
    Comprovante_Especialista VARCHAR(255),
    fk_ADM_ID_ADM INT,
    UNIQUE (Email_Especialista, Comprovante_Especialista)
);

CREATE TABLE ADM (
    ID_ADM INT AUTO_INCREMENT PRIMARY KEY,
    Nome_ADM VARCHAR(255),
    Apelido_ADM VARCHAR(255),
    Email_ADM VARCHAR(255),
    Senha_ADM VARCHAR(255),
    DataNasci_ADM DATE,
    SenhaEpicaSecreta_ADM VARCHAR(255),
    UNIQUE (Email_ADM, SenhaEpicaSecreta_ADM)
);

CREATE TABLE Especie (
    ID_Especie INT AUTO_INCREMENT PRIMARY KEY,
    NomeCientifico_Especie VARCHAR(255),
    NomeComum_Especie VARCHAR(255),
    DataRegistro_Especie DATE,
    Descricao_Especie VARCHAR(255),
    UNIQUE (NomeCientifico_Especie, NomeComum_Especie)
);

CREATE TABLE Post (
    ID_Post INT AUTO_INCREMENT PRIMARY KEY,
    Data_Post DATE,
    Descricao_Post VARCHAR(255),
    Like_Post INT,
    Deslike_Post INT,
    fk_Entusiasta_ID_Entusiasta INT
);

CREATE TABLE Catalogo (
    ID_Catalogo INT AUTO_INCREMENT PRIMARY KEY,
    DataCriacao_Catalogo DATE,
    Tipo_Catalogo VARCHAR(255)
);

CREATE TABLE Valida (
    fk_Especialista_ID_Especialista INT,
    fk_Especie_ID_Especie INT
);

CREATE TABLE Registrada (
    fk_Especie_ID_Especie INT,
    fk_Catalogo_ID_Catalogo INT
);

CREATE TABLE Registra (
    fk_Especialista_ID_Especialista INT,
    fk_Catalogo_ID_Catalogo INT
);
 
ALTER TABLE Entusiasta ADD CONSTRAINT FK_Entusiasta_2
    FOREIGN KEY (fk_ADM_ID_ADM)
    REFERENCES ADM (ID_ADM)
    ON DELETE CASCADE;
 
ALTER TABLE Especialista ADD CONSTRAINT FK_Especialista_2
    FOREIGN KEY (fk_ADM_ID_ADM)
    REFERENCES ADM (ID_ADM)
    ON DELETE CASCADE;
 
ALTER TABLE Post ADD CONSTRAINT FK_Post_2
    FOREIGN KEY (fk_Entusiasta_ID_Entusiasta)
    REFERENCES Entusiasta (ID_Entusiasta)
    ON DELETE CASCADE;
 
ALTER TABLE Valida ADD CONSTRAINT FK_Valida_1
    FOREIGN KEY (fk_Especialista_ID_Especialista)
    REFERENCES Especialista (ID_Especialista)
    ON DELETE SET NULL;
 
ALTER TABLE Valida ADD CONSTRAINT FK_Valida_2
    FOREIGN KEY (fk_Especie_ID_Especie)
    REFERENCES Especie (ID_Especie)
    ON DELETE SET NULL;
 
ALTER TABLE Registrada ADD CONSTRAINT FK_Registrada_1
    FOREIGN KEY (fk_Especie_ID_Especie)
    REFERENCES Especie (ID_Especie)
    ON DELETE SET NULL;
 
ALTER TABLE Registrada ADD CONSTRAINT FK_Registrada_2
    FOREIGN KEY (fk_Catalogo_ID_Catalogo)
    REFERENCES Catalogo (ID_Catalogo)
    ON DELETE SET NULL;
 
ALTER TABLE Registra ADD CONSTRAINT FK_Registra_1
    FOREIGN KEY (fk_Especialista_ID_Especialista)
    REFERENCES Especialista (ID_Especialista)
    ON DELETE SET NULL;
 
ALTER TABLE Registra ADD CONSTRAINT FK_Registra_2
    FOREIGN KEY (fk_Catalogo_ID_Catalogo)
    REFERENCES Catalogo (ID_Catalogo)
    ON DELETE SET NULL;
