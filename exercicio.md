```sql
    CREATE DATABASE  crud_escola_zimbo CHARACTER SET utf8mb4;
```
```sql
    CREATE TABLE alunos(
    id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    nome VARCHAR(30) NOT NULL,
    primeira DECIMAL(4,2) NOT NULL,
    segunda DECIMAL(4,2) NOT NULL
);
```

```sql
INSERT INTO alunos(
    nome, primeira, segunda)
VALUES(
    'João Paulo',
    10.00,
    9.7
), 
(
    'Armado Gomes',
    10.00,
    6.7
), 
(
    'Felipe Queiros',
    5.00,
    8.7
);
```