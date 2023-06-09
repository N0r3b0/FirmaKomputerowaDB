-- Tworzenie bazy danych
CREATE DATABASE FirmaKomputerowa;

-- Używanie bazy danych
USE FirmaKomputerowa;

-- Tworzenie tabeli Pracownicy
CREATE TABLE Pracownicy (
  ID_pracownika INT AUTO_INCREMENT PRIMARY KEY,
  Imie VARCHAR(50) CHARACTER SET utf8 COLLATE utf8_polish_ci,
  Nazwisko VARCHAR(50) CHARACTER SET utf8 COLLATE utf8_polish_ci,
  Stanowisko VARCHAR(50) CHARACTER SET utf8 COLLATE utf8_polish_ci
) CHARSET=utf8 COLLATE=utf8_polish_ci;

-- Tworzenie tabeli Komputery
CREATE TABLE Komputery (
  ID_komputera INT AUTO_INCREMENT PRIMARY KEY,
  Procesor VARCHAR(50) CHARACTER SET utf8 COLLATE utf8_polish_ci,
  RAM VARCHAR(50) CHARACTER SET utf8 COLLATE utf8_polish_ci,
  Karta VARCHAR(50) CHARACTER SET utf8 COLLATE utf8_polish_ci,
  HDD VARCHAR(50) CHARACTER SET utf8 COLLATE utf8_polish_ci
) CHARSET=utf8 COLLATE=utf8_polish_ci;  

-- Tworzenie tabeli Przypisanie
CREATE TABLE Przypisanie (
  ID_przypisania INT AUTO_INCREMENT PRIMARY KEY,
  ID_pracownika INT,
  ID_komputera INT,
  Data_przypisania DATE,
  Data_zwolnienia DATE,
  FOREIGN KEY (ID_pracownika) REFERENCES Pracownicy(ID_pracownika),
  FOREIGN KEY (ID_komputera) REFERENCES Komputery(ID_komputera)
);

-- Tworzenie tabeli Serwery
CREATE TABLE Serwery (
  ID_serwera INT AUTO_INCREMENT PRIMARY KEY,
  Procesor VARCHAR(50) CHARACTER SET utf8 COLLATE utf8_polish_ci,
  RAM VARCHAR(50) CHARACTER SET utf8 COLLATE utf8_polish_ci,
  Karta VARCHAR(50) CHARACTER SET utf8 COLLATE utf8_polish_ci,
  HDD VARCHAR(50) CHARACTER SET utf8 COLLATE utf8_polish_ci,
  Administrator INT,
  FOREIGN KEY (Administrator) REFERENCES Pracownicy(ID_pracownika)
) CHARSET=utf8 COLLATE=utf8_polish_ci; 

