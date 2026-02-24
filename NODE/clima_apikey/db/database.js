const mysql = require("mysql2/promise");

pool = mysql.createPool({
  host: "localhost",
  user: "root",
  password: "",
  database: "clima_prueba",
});

module.exports = pool;
