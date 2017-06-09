<?php
class Review extends Model {
    public function getList($onlyApproved = true, $order = 'created DESC') {
        $order = $this->db->escape($order);

        $sql = 'SELECT * FROM reviews WHERE 1 = 1';
        if($onlyApproved) {
            $sql .= ' AND is_approved = 1';
        }
        $sql .= " ORDER BY $order";
        return $this->db->query($sql);
    }

    public function getById($id) {
        $id = (int)$id;

        $sql = "SELECT * FROM reviews WHERE id=$id LIMIT 1";
        $result = $this->db->query($sql);
        return isset($result[0]) ? $result[0] : null;
    }

    public function save($data, $id = null) {
        $id = (int)$id;
        $author = $this->db->escape($data['author']);
        $email = $this->db->escape($data['email']);
        $message = $this->db->escape($data['message']);
        $image = isset($data['image']) ? $this->db->escape($data['image']) : '';
        $is_modified = isset($data['is_modified']) ? (int)$data['is_modified'] : 0;

        if($id) {
            // Update review record
            $created = date('Y-m-d H:i:s');
            $sql = "UPDATE reviews SET author = '$author', email = '$email', message = '$message', " . ($image ? "image='$image', " : '') . "is_modified = '$is_modified' WHERE id = $id";
        } else {
            // Add new review record
            $created = date('Y-m-d H:i:s');
            $sql = "INSERT INTO reviews SET author = '$author', email = '$email', message = '$message', " . ($image ? "image='$image', " : '') . "is_modified = '$is_modified', created = '$created'";
        }
        return $this->db->query($sql);
    }

    public function approve($id, $is_approved) {
        $id = (int)$id;
        $is_approved = (int)$is_approved;

        $sql = $sql = "UPDATE reviews SET is_approved = $is_approved WHERE id = $id";
        return $this->db->query($sql);
    }
}