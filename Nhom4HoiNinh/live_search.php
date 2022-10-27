<?php 
    include('./connection/connect.php');


    if(isset($_GET['ma_loai'])){
        $ma_loai = $_GET['ma_loai'];

        //ham strtolower(str) chuyen hoa thang thuong
        $name = strtolower($ma_loai);

        $query = "select *,st_x(ST_Centroid(geom)) as x,st_y(ST_Centroid(geom)) as y from public.dan_cu where LOWER(ma_loai) like '%$name%'";
        $result = pg_query($conn, $query);
        $tong_so_ket_qua = pg_num_rows($result);

        if($tong_so_ket_qua > 0) {
            while($dong = pg_fetch_array($result, null, PGSQL_ASSOC)) {
                $link = "<a href='javascript:void(0);' onclick='di_den_diem(".$dong['x'].",".$dong['y'].")'>Xem ngay</a>";

                print("Loại đất: ".$dong['ma_loai']." | Diện tích: ".$dong['shape_area']." ".$link."</br>");
            }
        }else {
            print("Not found");
        }
    }else {
        echo "Not Found";
    }

?>