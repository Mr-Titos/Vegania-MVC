<?php
class Model{
    public $table;
    public $id;


	function read($pdo,$shield=null){
        if($shield == null){
            $shield="*";
        }        
       
        $requete = $pdo->prepare("SELECT $shield FROM $this->table where id=:id");      
        $requete->bindParam(':id',$this->id);
        $requete->execute();
        //var_dump($requete->execute());
        $resultats=$requete->fetchAll(PDO::FETCH_OBJ);
		
		return $resultats[0];
       
	}

	function save($pdo,$data){
	
        if(isset($data['id']) && !empty($data['id'])){
            $sql="UPDATE $this->table SET ";
            foreach($data as $k => $v){
                if($k != "id"){
                    $sql.="$k=:$k,";
                }
            }
			
            $sql =substr($sql,0,-1);
            $sql .=" WHERE id=".(int)$data['id'];
            //var_dump($sql);
            $requete = $pdo->prepare($sql);
           
            
            foreach($data as $k=>$v){
                if($k != "id"){
                    echo ':'.$k;
                    echo $v;
                    $requete->bindValue(':'.$k,$v);
                    echo "<br>";
                }
                
            }
            $requete->execute();
        }else{
            $sql="INSERT INTO $this->table (";
            foreach($data as $k=>$v){
                if($k != "id"){
                    $sql.="$k,";
                }
                
            }
            $sql =substr($sql,0,-1);
            
            $sql .=") VALUES(";
            foreach($data as $k=>$v){

                if($k != "id"){
                    $sql.=':'.$k.',';
                }
                
            }
            $sql =substr($sql,0,-1);
            $sql .=")";
            //var_dump($sql);
            $requete = $pdo->prepare($sql);
            
            
            foreach($data as $k=>$v){
                if($k != "id"){
                   // echo ':'.$k;
                   // echo $v;
                    $requete->bindValue(':'.$k,$v);
                   // echo "<br>";
                }
                
            }
           if( $requete->execute()) return true;
           else return false;
        }
       
	}
	
	function delete($pdo,$id){
        $sql="DELETE FROM $this->table where id=:id";
        $requete = $pdo->prepare($sql);
       // var_dump($requete);        
        $requete->bindParam(':id',$id);
        $requete->execute();
    
    }
	
	function find($pdo, $data=array(),$cha){
        $condition="1=1";
        $champs=$cha;
        $limit="";
        $order="";
        
        if(isset($data['condition'])) {$condition=$data['condition'];}
        if(isset($data['champs'])) {$champs=$data['champs'];}
        if(isset($data['limit'])) {$limit="LIMIT ".$data['limit'];}
        if(isset($data['order'])) {$order=$data['order'];}
        
        $sql="SELECT $champs from $this->table WHERE $condition  $order $limit";
        $requete = $pdo->prepare($sql);        
        $requete->execute();
        $resultats=$requete->fetchAll(PDO::FETCH_OBJ);
        return $resultats;
        
        
    }
	
	static function load($name){
        require(ROOT.'models/'.$name.'.php');
        //var_dump($name);        
        return new $name();
      
    }
}


?>