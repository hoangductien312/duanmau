<?php
class Category extends BaseModel{
    protected $table = 'categorys';
    // Lấy tất cả danh mục
    public function getAll(){
        $sql = "SELECT * FROM {$this->table}";
        $stmt = $this->pdo->query($sql);
        return $stmt->fetchAll();
    }

    // Lấy tất cả danh mục kèm số lượng sản phẩm
    public function getAllWithProductCount(){
        $sql = "SELECT c.id, c.name, COUNT(p.id) AS product_count 
                FROM categorys c 
                LEFT JOIN products p ON c.id = p.id_category 
                GROUP BY c.id";
        $stmt = $this->pdo->query($sql);
        return $stmt->fetchAll();
    }

    public function getById($id){
        $sql = "SELECT * FROM {$this->table} WHERE id = :id";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute(['id' => $id]);
        return $stmt->fetch();
    }

    public function create($data){
        $sql = "INSERT INTO {$this->table} (name) VALUES (:name)";
        $stmt = $this->pdo->prepare($sql);
        return $stmt->execute(['name' => $data['name']]);
    }

    public function update($data){
        $sql = "UPDATE {$this->table} SET name = :name WHERE id = :id";
        $stmt = $this->pdo->prepare($sql);
        return $stmt->execute([
            'id' => $data['id'],
            'name' => $data['name']
        ]);
    }

    public function delete($id){
        $sql = "DELETE FROM {$this->table} WHERE id = :id";
        $stmt = $this->pdo->prepare($sql);
        return $stmt->execute(['id' => $id]);
    }
}
?>