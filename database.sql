CREATE DATABASES campus;

CREATE TABLE campers(
    id INT primary key AUTO_INCREMENT,
    NOMBRES VARCHAR (50) NOT NULL,
    direccion VARCHAR (50) NOT NULL,
    logros VARCHAR (50) NOT NULL,
    ingles VARCHAR (50) NOT NULL,
    ser VARCHAR (50) NOT NULL,
    review VARCHAR (50) NOT NULL,
    skills VARCHAR (50) NOT NULL
);