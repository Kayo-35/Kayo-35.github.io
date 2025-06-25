-- Criação da Tabela tipoFuncionario
CREATE TABLE tipoFuncionario (
    cd_tipo INT NOT NULL,
    nm_tipo VARCHAR(30),
    CONSTRAINT pk_tipoFuncionario PRIMARY KEY (cd_tipo)
);

-- Criação da Tabela departamento
CREATE TABLE departamento (
    cd_departamento INT NOT NULL,
    nm_departamento VARCHAR(50),
    CONSTRAINT pk_departamento PRIMARY KEY (cd_departamento)
);

-- Criação da Tabela funcionario
CREATE TABLE funcionario (
    cd_matricula INT NOT NULL,
    cd_senha VARCHAR(20) NOT NULL,
    cd_departamento INT NOT NULL,
    cd_tipo INT NOT NULL,
    nm_nome VARCHAR(100) NOT NULL,
    nm_email VARCHAR(120),
    hr_entrada TIME NOT NULL,
    hr_saida TIME NOT NULL,
    CONSTRAINT pk_funcionario PRIMARY KEY (cd_matricula),
    CONSTRAINT fk_tipo_funcionario FOREIGN KEY (cd_tipo) REFERENCES tipoFuncionario (cd_tipo),
    CONSTRAINT fk_departamento_funcionario FOREIGN KEY (cd_departamento) REFERENCES departamento (cd_departamento)
);

-- Criação da Tabela tipo_ponto
CREATE TABLE tipo_ponto (
    cd_tipo_ponto INT NOT NULL AUTO_INCREMENT,
    nm_ponto VARCHAR(20),
    CONSTRAINT pk_tipo_ponto PRIMARY KEY (cd_tipo_ponto)
);

-- Criação da Tabela ponto
CREATE TABLE ponto (
    cd_ponto INT NOT NULL AUTO_INCREMENT,
    cd_tipo INT NOT NULL,
    cd_funcionario INT NOT NULL,
    dt_ponto DATE NOT NULL,
    hr_ponto TIME NOT NULL,
    CONSTRAINT pk_ponto PRIMARY KEY (cd_ponto),
    CONSTRAINT fk_funcionario FOREIGN KEY (cd_funcionario) REFERENCES funcionario (cd_matricula),
    CONSTRAINT fk_tipo_ponto FOREIGN KEY (cd_tipo) REFERENCES tipo_ponto (cd_tipo_ponto)
);

-- Inserções na tabela tipoFuncionario: 2 = Comum, 2 = Gerente
INSERT INTO
    tipoFuncionario (cd_tipo, nm_tipo)
VALUES
    (1, 'Comum'),
    (2, 'Gerente');

-- Inserções na tabela departamento
INSERT INTO
    departamento (cd_departamento, nm_departamento)
VALUES
    (1, 'Recursos Humanos'),
    (2, 'Tecnologia'),
    (3, 'Financeiro');

INSERT INTO
    tipo_ponto
VALUES
    (1, 'Entrada'),
    (2, 'Saída');

INSERT INTO
    funcionario (
        cd_matricula,
        cd_senha,
        cd_departamento,
        cd_tipo,
        nm_nome,
        nm_email,
        hr_entrada,
        hr_saida
    )
VALUES
    (
        1,
        'gerente2000',
        1,
        2,
        'Gerente Recursos Humanos',
        'gerente_recursos_humanos@empresa.com',
        '08:00:00',
        '17:00:00'
    ),
    (
        2,
        'comum2000',
        1,
        1,
        'Funcionario 1 Recursos Humanos',
        'func_1_recursos_humanos@empresa.com',
        '09:00:00',
        '18:00:00'
    ),
    (
        3,
        'comum2000',
        1,
        1,
        'Funcionario 2 Recursos Humanos',
        'func_2_recursos_humanos@empresa.com',
        '09:00:00',
        '18:00:00'
    ),
    (
        4,
        'comum2000',
        1,
        1,
        'Funcionario 3 Recursos Humanos',
        'func_3_recursos_humanos@empresa.com',
        '09:00:00',
        '18:00:00'
    ),
    (
        5,
        'comum2000',
        1,
        1,
        'Funcionario 4 Recursos Humanos',
        'func_4_recursos_humanos@empresa.com',
        '09:00:00',
        '18:00:00'
    ),
    (
        6,
        'comum2000',
        1,
        1,
        'Funcionario 5 Recursos Humanos',
        'func_5_recursos_humanos@empresa.com',
        '09:00:00',
        '18:00:00'
    ),
    (
        7,
        'gerente2000',
        2,
        2,
        'Gerente Tecnologia',
        'gerente_tecnologia@empresa.com',
        '08:00:00',
        '17:00:00'
    ),
    (
        8,
        'comum2000',
        2,
        1,
        'Funcionario 1 Tecnologia',
        'func_1_tecnologia@empresa.com',
        '09:00:00',
        '18:00:00'
    ),
    (
        9,
        'comum2000',
        2,
        1,
        'Funcionario 2 Tecnologia',
        'func_2_tecnologia@empresa.com',
        '09:00:00',
        '18:00:00'
    ),
    (
        10,
        'comum2000',
        2,
        1,
        'Funcionario 3 Tecnologia',
        'func_3_tecnologia@empresa.com',
        '09:00:00',
        '18:00:00'
    ),
    (
        11,
        'comum2000',
        2,
        1,
        'Funcionario 4 Tecnologia',
        'func_4_tecnologia@empresa.com',
        '09:00:00',
        '18:00:00'
    ),
    (
        12,
        'comum2000',
        2,
        1,
        'Funcionario 5 Tecnologia',
        'func_5_tecnologia@empresa.com',
        '09:00:00',
        '18:00:00'
    ),
    (
        13,
        'gerente2000',
        3,
        2,
        'Gerente Financeiro',
        'gerente_financeiro@empresa.com',
        '08:00:00',
        '17:00:00'
    ),
    (
        14,
        'comum2000',
        3,
        1,
        'Funcionario 1 Financeiro',
        'func_1_financeiro@empresa.com',
        '09:00:00',
        '18:00:00'
    ),
    (
        15,
        'comum2000',
        3,
        1,
        'Funcionario 2 Financeiro',
        'func_2_financeiro@empresa.com',
        '09:00:00',
        '18:00:00'
    ),
    (
        16,
        'comum2000',
        3,
        1,
        'Funcionario 3 Financeiro',
        'func_3_financeiro@empresa.com',
        '09:00:00',
        '18:00:00'
    ),
    (
        17,
        'comum2000',
        3,
        1,
        'Funcionario 4 Financeiro',
        'func_4_financeiro@empresa.com',
        '09:00:00',
        '18:00:00'
    ),
    (
        18,
        'comum2000',
        3,
        1,
        'Funcionario 5 Financeiro',
        'func_5_financeiro@empresa.com',
        '09:00:00',
        '18:00:00'
    );
