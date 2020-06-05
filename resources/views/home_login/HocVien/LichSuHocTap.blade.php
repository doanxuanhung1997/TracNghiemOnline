 @extends('home_login.layout.index')

@section('content')
@if(session('thongbao'))
          <div class="alert alert-success">
            {{session('thongbao')}}
          </div>
          @endif
        <h3 style="color: #2E9AFE">Danh Sách Các Bài Thi Đã Hoàn Thành Của Bạn</h3>
        <div class="row" >
            <div class="col-md-8">
                <table class="table table-bordered">
                	<thead>
                		<tr>
                            <th>STT</th>
                			<th>De Thi</th>
                			<th>Diem So</th>
                			<th>Thoi Gian</th>
                		</tr>
                	</thead>
                	<tbody>
                        <?php $stt=0; ?>
                        @foreach($bangdiem as $bd)
                        <?php $stt+=1; ?>
                		<tr>
                            <td><?php echo $stt ?></td>
                			<td><?php echo $bd->TenDeThi?></td>
                            <td>{{$bd->DiemSo}}</td>
                			<td>{{$bd->NgayLamBai}}</td>
                		</tr>
                		@endforeach
                	</tbody>
                </table>
            </div>
            <div class="col-md-4">
                <!-- Điểm cao trong tuần -->
                <h3 style="font-size:21px;color:blueviolet"><strong>Top điểm cao trong 7 ngày qua</strong></h3>
                <div class="row f6" >
                    <div class="col-md-12">
                        <div class="box3"><a href="#" class="link"></a></div>
                        <div class="box4">
                            
                            <p class="f7"><a href="#">Nhuyễn hồ Bảo Thy,Bài thi số 240550</a><br>
                            Lớp 6, môn Tiếng anh
                                <br>
                                <span class="span1">100 điểm</span>
                                vào 20:18:21,25/09/2018
                                
                            </p>
                       </div>
                    </div>
                    
                </div>
                <div class="row f6">
                    <div class="col-md-12">
                        <div class="box3"><a href="#" class="link"></a></div>
                        <div class="box4">
                            
                            <p class="f7"><a href="#">Trần Thị Như Hoàng,Bài thi số 23975</a><br>
                            Lớp 11, môn sinh học
                                <br>
                                <span class="span1">100 điểm</span>
                                vào 16:18:21,15/09/2018
                                
                            </p>
                       </div>
                    </div>
                    
                </div>
                <div class="row f6">
                    <div class="col-md-12">
                        <div class="box3"><a href="#" class="link"></a></div>
                        <div class="box4">
                            
                            <p class="f7"><a href="#">Khung,Bài thi số 24058</a><br>
                            Lớp 6, môn Tiếng anh
                                <br>
                                <span class="span1">96.7 điểm</span>
                                vào 20:18:21,25/09/2018
                                
                            </p>
                       </div>
                    </div>
                    
                </div>
                <div class="row f6">
                    <div class="col-md-12">
                        <div class="box3"><a href="#" class="link"></a></div>
                        <div class="box4">
                            
                            <p class="f7"><a href="#">Ngọc An,Bài thi số 240550</a><br>
                            Lớp 6, môn Vật lý
                                <br>
                                <span class="span1">95 điểm</span>
                                vào 20:18:21,25/09/2018
                                
                            </p>
                       </div>
                    </div>
                    
                </div>
                <div class="row f6">
                    <div class="col-md-12">
                        <div class="box3"><a href="#" class="link"></a></div>
                        <div class="box4">
                            
                            <p class="f7"><a href="#">Ngọc Tang,Bài thi số 240550</a><br>
                            Lớp 6, môn Địa  lý
                                <br>
                                <span class="span1">95 điểm</span>
                                vào 20:18:21,25/09/2018
                                
                            </p>
                       </div>
                    </div>
                    
                </div>
                <div class="row f6">
                    <div class="col-md-12">
                        <div class="box3"><a href="#" class="link"></a></div>
                        <div class="box4">
                            
                            <p class="f7"><a href="#">Ngô Thừa Ân ,Bài thi số 240599</a><br>
                            Lớp 6, môn Vật lý
                                <br>
                                <span class="span1">95 điểm</span>
                                vào 20:18:21,25/09/2018
                                
                            </p>
                       </div>
                    </div>
                    
                </div>
                <div class="row f6">
                    <div class="col-md-12">
                        <div class="box3"><a href="#" class="link"></a></div>
                        <div class="box4">
                            
                            <p class="f7"><a href="#">Ngọc Anh Nguyễn,Bài thi số 240558</a><br>
                            Lớp 6, môn Vật lý
                                <br>
                                <span class="span1">94 điểm</span>
                                vào 20:18:21,25/09/2018
                                
                            </p>
                       </div>
                    </div>
                    
                </div>
                <div class="row f6">
                    <div class="col-md-12">
                        <div class="box3"><a href="#" class="link"></a></div>
                        <div class="box4">
                            
                            <p class="f7"><a href="#">Phạm Văn Cảnh,Bài thi số 240088</a><br>
                            Lớp 6, môn Vật lý
                                <br>
                                <span class="span1">91 điểm</span>
                                vào 20:18:21,25/09/2018
                                
                            </p>
                       </div>
                    </div>
                    
                </div>
                <div class="row f6">
                    <div class="col-md-12">
                        <div class="box3"><a href="#" class="link"></a></div>
                        <div class="box4">
                            
                            <p class="f7"><a href="#">Ngọc Hoàng,Bài thi số 240220</a><br>
                            Lớp 6, môn Vật lý
                                <br>
                                <span class="span1">89 điểm</span>
                                vào 20:18:21,25/09/2018
                                
                            </p>
                       </div>
                    </div>
                    
                </div>
                <div class="row f6">
                    <div class="col-md-12">
                        <div class="box3"><a href="#" class="link"></a></div>
                        <div class="box4">
                            
                            <p class="f7"><a href="#">Ngọc Đại,Bài thi số 240550</a><br>
                            Lớp 6, môn Vật lý
                                <br>
                                <span class="span1">85 điểm</span>
                                vào 20:18:21,25/09/2018
                                
                            </p>
                       </div>
                    </div>
                    
                </div>


                <!-- Đề thi trắc nghiệm mới -->

                <h3 class="f8">Đề Thi Trắc Nghiệm mới</h3>
                <div class="row" class="f9">
                    <p class="b1"">
                        <span class="span2">40 câu hỏi</span>
                        <span class="span2">50 phút</span>
                        <a href="#">THPT Quốc Gia</a><br>
                        <a href="#">Đề Thi thử THPT QG năm 2018 môn GDCD số 8</a>
                    </p>
                </div>
                <div class="row f1 f6" >
                    <p class="b1"">
                        <span class="span2">40 câu hỏi</span>
                        <span class="span2">50 phút</span>
                        <a href="#">THPT Quốc Gia</a><br>
                        <a href="#">Đề Thi thử THPT QG năm 2018 môn GDCD số 8</a>
                    </p>
                </div>
                <div class="row" class="f9">
                    <p class="b1"">
                        <span class="span2">40 câu hỏi</span>
                        <span class="span2">50 phút</span>
                        <a href="#">THPT Quốc Gia</a><br>
                        <a href="#">Đề Thi thử THPT QG năm 2018 môn GDCD số 8</a>
                    </p>
                </div>
                <div class="row f1 f6" >
                    <p class="b1"">
                        <span class="span2">40 câu hỏi</span>
                        <span class="span2">50 phút</span>
                        <a href="#">THPT Quốc Gia</a><br>
                        <a href="#">Đề Thi thử THPT QG năm 2018 môn GDCD số 8</a>
                    </p>
                </div>
                <div class="row" class="f9">
                    <p class="b1"">
                        <span class="span2">40 câu hỏi</span>
                        <span class="span2">50 phút</span>
                        <a href="#">THPT Quốc Gia</a><br>
                        <a href="#">Đề Thi thử THPT QG năm 2018 môn GDCD số 8</a>
                    </p>
                </div>
                <div class="row f1 f6">
                    <p class="b1"">
                        <span class="span2">40 câu hỏi</span>
                        <span class="span2">50 phút</span>
                        <a href="#">THPT Quốc Gia</a><br>
                        <a href="#">Đề Thi thử THPT QG năm 2018 môn GDCD số 8</a>
                    </p>
                </div>
                <div class="row" class="f9">
                    <p class="b1"">
                        <span class="span2">40 câu hỏi</span>
                        <span class="span2">50 phút</span>
                        <a href="#">THPT Quốc Gia</a><br>
                        <a href="#">Đề Thi thử THPT QG năm 2018 môn GDCD số 8</a>
                    </p>
                </div>
                <div class="row f1 f6" >
                    <p class="b1">
                        <span class="span2">40 câu hỏi</span>
                        <span class="span2">50 phút</span>
                        <a href="#">THPT Quốc Gia</a><br>
                        <a href="#">Đề Thi thử THPT QG năm 2018 môn GDCD số 8</a>
                    </p>
                </div>
                <div class="row" class="f9">
                    <p class="b1"">
                        <span class="span2">40 câu hỏi</span>
                        <span class="span2">50 phút</span>
                        <a href="#">THPT Quốc Gia</a><br>
                        <a href="#">Đề Thi thử THPT QG năm 2018 môn GDCD số 8</a>
                    </p>
                </div>
            </div>
        </div>
@endsection