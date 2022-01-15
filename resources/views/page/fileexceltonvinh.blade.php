<table class="table">
    <thead class="thead-dark">
        <tr>
            <th colspan="3">

            </th>
            <th colspan="15">
                <h3>DANH SÁCH KẾT QUẢ CÁ NHÂN HIẾN MÁU TÌNH NGUYỆN 5 LẦN TRỞ LÊN
                ĐƯỢC TÔN VINH TỈNH BÌNH ĐỊNH NĂM 2021</h3>
            </th>
        </tr>
        <tr>
            <th colspan="1">

            </th>
            <th colspan="15">
                <h5>(Căn cứ theo Quy chế Tôn vinh, khen thưởng cá nhân, tập thể có thành tích Hiến máu tình nguyện và vận động hiến máu tình nguyện tại Quyết </h5>
            </th>
        </tr>
        <tr>
            <th colspan="2">

            </th>
            <th colspan="15">
                <h5>định số 138/QĐ-BCĐQG ngày 28 tháng 8 năm 2008 của Ban Chỉ đạo quốc gia vận động hiến máu tình nguyện)</h5>
            </th>
        </tr>
        <tr>
            <th scope="col">ID</th>
            <th  colspan="2" scope="col">Họ và tên</th>
            <th   colspan="2" scope="col">Ngày Sinh</th>
            <th   colspan="2" scope="col">Số Điện Thoại</th>
            <th   colspan="2" scope="col">Địa Chỉ</th>
            <th   colspan="2" scope="col">Mức Tôn Vinh</th>
            <th   colspan="2" scope="col">Nhóm Máu ABO</th>
            <th   colspan="2" scope="col">Nhóm Máu Rh</th>
            <th   colspan="2" scope="col">Số lần hiến</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($list_tonvinh as $key => $val)
            <tr>
                <th scope="row">{{$val->id}}</th>
                <th  colspan="2" >{{$val->hoten}}</th>
                <th  colspan="2">{{$val->ngaysinh}}</th>
                <th  colspan="2" >{{$val->sodienthoai}}</th>
                <th colspan="2">{{$val->diachi}}</th>
                <th colspan="2">{{$val->muctonvinh}}</th>
                <th colspan="2">{{$val->nhommau}}</th>
                <th colspan="2">{{$val->nhomRh}}</th>
                <th colspan="2">{{$val->solanhien}}</th>
            </tr>
        @endforeach
        <tr rowspan='4' >

        </tr>
        <tr>
            <th  colspan="2">

            </th>
            <th colspan="3">

            </th>
            <th colspan="7">

            </th>
            <th colspan="4">
                <h3>.......,Ngày ... Tháng ... Năm 202....</h3>
            </th>
        </tr>
        <tr>
            <th  colspan="2">

            </th>
            <th  colspan="3">
                <h3>Người lập biểu</h3>
            </th>
            <th colspan="8">

            </th>
            <th  colspan="4">
                <h3>CHỦ TỊCH</h3>
            </th>
        </tr>
        <tr rowspan='4' >

        </tr>
        <tr rowspan='4' >

        </tr>
        <tr>
            <th  colspan="2">

            </th>
            <th  colspan="3">
                <h3>Bùi Mỹ Kiều	</h3>
            </th>
            <th colspan="8">

            </th>
            <th  colspan="2">
                <h3>Thái Kim Dung	</h3>
            </th>
        </tr>
    </tbody>
    </table>
