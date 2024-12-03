CREATE DATABASE FreteLog;
USE FreteLog;

CREATE TABLE USUARIOS(
    ID INT PRIMARY KEY AUTO_INCREMENT,
    NomeUsu VARCHAR(50) UNIQUE,
    SenhaUsu VARCHAR(50)
);

CREATE TABLE Transportadores(
	cnpjTr VARCHAR(18) PRIMARY KEY,
    nomeTr VARCHAR(50),
    cidadeTr VARCHAR(30),
    estadoTr VARCHAR(30),
    statusTr VARCHAR(10),
    CHECK (statusTr IN ('ativo', 'inativo', 'Ativo', 'Inativo'))
);

CREATE TABLE Embarcadores(
	cnpjEmb VARCHAR(18) PRIMARY KEY,
    nomeEmb VARCHAR(50),
    segmentoEmb VARCHAR(50),
    cidadeEmb VARCHAR(30),
    estadoEmb VARCHAR(30),
    statusEmb VARCHAR(10),
    CHECK (statusEmb IN ('ativo', 'inativo'))
);

CREATE TABLE NotasFiscais(
	numNF INT PRIMARY KEY,
    cnpjEmbNF VARCHAR(18),
    cnpjTrNF VARCHAR(18)
);

select * from embarcadores;

-- DROP DATABASE FRETELOG;
