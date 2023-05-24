<?php 

    

    require_once("db.php");

    class Config{

        private $id;
        private $nombres;
        private $direccion;
        private $logros;
        private $ingles;
        private $ser;
        private $review;
        private $skills;
        protected $dbCnx;

        public function __construct($id = 0, $nombres = "", $direccion = "" , $logros = "" ,$ingles = "" , $ser = "" , $review = "" , $skills = "" ){
            $this->id = $id;
            $this->nombres = $nombres;
            $this->direccion = $direccion;
            $this->logros = $logros;
            $this->ingles = $ingles;
            $this->ser = $ser;
            $this->review = $review;
            $this->skills = $skills;
            $this->dbCnx = new PDO(DB_TYPE.":host=".DB_HOST.";dbname=".DB_NAME , DB_USER , DB_PWD , [PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC]);
        }

        //----------------id-------------------

        public function setId($id){
            $this-> id = $id;
        }

        public function getId(){
            return $this->id;
        }

        //----------------nombre-------------------

        public function setNombres($nombres){
            $this-> nombres = $nombres;
        }

        public function getNombres(){
            return $this -> nombres;
        }

        //----------------direccion-------------------

        public function setDireccion($direccion){
            $this-> direccion = $direccion;
        }

        public function getDireccion(){
            return $this -> direccion;
        }

        //----------------logros----------------------

        public function setLogros($logros){
            $this->logros = $logros;
        }

        public function getLogros(){
            return $this -> logros;
        }

        //----------------Ingles----------------------

        public function setIngles($ingles){
            $this->ingles = $ingles;
        }

        public function getIngles(){
            return $this-> ingles;
        }

        //----------------Ser----------------------

        public function setSer($ser){
            $this->ser = $ser;
        }

        public function getSer(){
            return $this-> ser;
        }

        //----------------Review----------------------

        public function setReview($review){
            $this->review = $review;
        }

        public function getReview(){
            return $this-> review;
        }

        //----------------Skills----------------------

        public function setSkills($skills){
            $this->skills = $skills;
        }
        public function getSkills(){
            return $this-> skills;
        }

        //----------------Metodo Insertor----------------------


        public function insertData(){
            try {

                $stm = $this -> dbCnx -> prepare("INSERT INTO camperV2 (id, NOMBRES , direccion , logros , ingles , ser , review , skills) VALUES (NULL , ? , ? , ? , ? , ? , ? , ?);");
                $stm  -> execute([$this -> nombres , $this-> direccion , $this-> logros , $this-> ingles , $this-> ser , $this-> review , $this-> skills]);

            } catch ( Exception $e) {
                return $e -> getMessage();
            }
            
        }

        //----------------Metodo Fetch---------------------------

        public function selectAll(){
            try {
                $stm = $this-> dbCnx-> prepare("SELECT * FROM camperV2");
                $stm -> execute();
                return $stm -> fetchAll();
            } catch (Exception $e) {
                return $e->getMessage();
            }
        }

        //----------------Metodo Delete--------------------------

        public function delete(){
            try {
                $stm = $this-> dbCnx -> prepare("DELETE FROM camperV2 WHERE id = ? ");
                $stm -> execute([$this->id]);
                return $stm -> fetchAll();
                echo "<script>alert(Borrado exitosamente); document.location='estudiantes.php'</script>";
            } catch (Exception $e) {
                return $e -> getMessage();
            }
        }
    }

?>