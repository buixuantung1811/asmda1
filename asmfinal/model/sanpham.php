<?php 
// Thêm mới
    function insert_sanpham($tensp,$giasp,$hinh,$mota,$iddm){
        $sql="insert into sanpham(name,price,img,mota,iddm) values('$tensp','$giasp','$hinh','$mota','$iddm')";
        pdo_execute($sql);
    }
// Xóa
    function delete_sanpham($id){
        $sql="delete from sanpham where id=".$id;
        pdo_execute($sql);
    }
// Load home    
    function loadall_sanpham_home(){
        $sql="select * from sanpham where 1 order by id desc limit 0,9";
        $listsanpham=pdo_query($sql);
        return $listsanpham;
    }
// Load home Top 10
function loadall_sanpham_top10(){
    $sql="select * from sanpham where 1 order by luotxem desc limit 0,10";
    $listsanpham=pdo_query($sql);
    return $listsanpham;
}
// load
    function loadall_sanpham($kyw="",$iddm=0){
        $sql="select * from sanpham where 1";
        if($kyw!=""){
            $sql.=" and name like '%".$kyw."%'";
        }
        if($iddm>0){
            $sql.=" and iddm ='".$iddm."'";
        }
        $sql.=" order by id desc";
        $listsanpham=pdo_query($sql);
        return $listsanpham;
    }
    function load_ten_dm($idmm){
        if($idmm>0){
        $sql="select * from danhmuc where id=".$idmm;
        $dm= pdo_query_one($sql);
        extract($dm);
        return $name;
        }else {
            return "";
        }
    } 
    // load 1 sản phẩm
    function loadone_sanpham($id){
        $sql="select * from sanpham where id=".$id;
        $sp= pdo_query_one($sql);
        return $sp;
    }
    function load_sanpham_cungloai($id,$iddm){
        $sql="select * from sanpham where iddm=".$iddm." AND id <> ".$id;
        $listsanpham=pdo_query($sql);
        return $listsanpham;
    }
    // update 
    function update_sanpham($id,$iddm,$tensp,$giasp,$mota,$hinh){
        if($hinh!="")
            $sql="update sanpham set iddm='".$iddm."', name='".$tensp."', price='".$giasp."',mota='".$mota."',img='".$hinh."' where id=".$id;
        else 
            $sql="update sanpham set iddm='".$iddm."', name='".$tensp."', price='".$giasp."',mota='".$mota."' where id=".$id;
        pdo_execute($sql);
    }
?>