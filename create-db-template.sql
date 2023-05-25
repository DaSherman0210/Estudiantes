-- Active: 1685022178087@@127.0.0.1@3306
CREATE DATABASE academia;

USE academia;

CREATE TABLE Estudiantes(
    id_estudiante INTEGER PRIMARY KEY,
    nombre VARCHAR(255) NOT NULL,
    apellido VARCHAR(255) NOT NULL,
    edad INT
);

CREATE TABLE Notas(
    id_nota INTEGER PRIMARY KEY,
    id_estudiante INT,
    asignatura VARCHAR(255) NOT NULL,
    calificacion FLOAT NOT NULL,
    FOREIGN KEY (id_estudiante) REFERENCES Estudiantes(id_estudiante)
);

INSERT INTO Estudiantes (id_estudiante, nombre, apellido, edad)
VALUES
(1, 'Josué', 'Giraldo', 20),
(2, 'German', 'Garmendia', 17),
(3, 'Luis', 'Prada', 24);

INSERT INTO Notas (id_nota, id_estudiante, asignatura, calificacion)
VALUES
(1, 1, "PHP", 4.2),
(2, 2, "JavaScript", 4.8),
(3, 3, "CSS", 3.8);

SELECT * FROM Estudiantes;
SELECT * FROM Notas;

SELECT Estudiantes.id_estudiante, Estudiantes.nombre, Estudiantes.apellido, Notas.asignatura, Notas.calificacion
FROM Estudiantes
INNER JOIN Notas ON Estudiantes.id_estudiante = Notas.id_estudiante;

DROP TABLE Notas;
DROP TABLE Estudiantes;