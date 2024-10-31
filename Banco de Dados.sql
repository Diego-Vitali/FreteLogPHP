CREATE DATABASE FreteLog;
USE FreteLog;

CREATE TABLE Transportadores(
	cnpjTr INT PRIMARY KEY,
    nomeTr VARCHAR(50),
    cidadeTr VARCHAR(30),
    estadoTr VARCHAR(30),
    statusTr VARCHAR(10),
    CHECK (statusTr IN ('ativo', 'inativo'))
);

CREATE TABLE Embarcadores(
	cnpjEmb INT PRIMARY KEY,
    nomeEmb VARCHAR(50),
    segmentoEmb VARCHAR(50),
    cidadeEmb VARCHAR(30),
    estadoEmb VARCHAR(30),
    statusEmb VARCHAR(10),
    CHECK (statusEmb IN ('ativo', 'inativo'))
);

CREATE TABLE NotasFiscais(
	numNF INT PRIMARY KEY,
    cnpjEmbNF INT,
    cnpjTrNF INT,
    FOREIGN KEY (cnpjEmbNF) REFERENCES Embarcadores(cnpjEmb),
    FOREIGN KEY (cnpjTrNF) REFERENCES Transportadores(cnpjTr)
);