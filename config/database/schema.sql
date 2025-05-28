
CREATE TABLE candidatos (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(100) NOT NULL,
    partido VARCHAR(100)
);

CREATE TABLE votos (
    id INT AUTO_INCREMENT PRIMARY KEY,
    eleitor_id INT,
    candidato_id INT,
    data_voto DATETIME DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (eleitor_id) REFERENCES eleitores(id),
    FOREIGN KEY (candidato_id) REFERENCES candidatos(id)
);
