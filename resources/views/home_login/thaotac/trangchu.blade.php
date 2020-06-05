 @extends('home_login.layout.index')

@section('content')

 <div class="row f1" >
            <div class="col-md-4" >
                <img src="http://thithu24h.com/media/articles/2018_09/photo-0-15378485494341775930303.jpg" alt="logo thi THPT Quốc Gia năm 2019" style="width:85%;height:32%;">
                <h3 class="t1">Thi THPT Quốc Gia năm 2019:"Đề thi không phục vụ mục tiêu "2 trong 1".</h3>
                <p class="cnt1">Bộ trưởng bộ GD&ĐT Phùng Xuân Nhạ cho biết trong năm tới đề thi không phục mục tiêu kì thi "2 trong 1" mà phục vụ đánh giá thực chất chất lượng dạy và... </p>
            </div>
            <div class="col-md-3 cnt1 f2" >
                <ul>
                    <li><a href="">Thi THPT quốc gia:Tách 2 phần có phức tạp?</a></li>
                    <li><a href="">Học bổng toàn phần của Quỹ học bổng tưởng nhớ Konosuke Matsushita Đại học Tokyo tại Nhật bản, 2018</a></li>
                    <li><a href="">Chương trình học bổng nghiên cứu của Facebook, 2019</a></li>
                    <li><a href="">Đổi mới các phương pháp giảng dạy tại các cơ sở giáo dục nghề nghiệp.</a></li>
                    <li><a href="">Đội unifesh giành học bổng 88.000 USD tại University Of The Pacific.</a></li>
                    <li><a href="">Thêm một số trường đại học khu vực phía Bắc tuyển sinh bổ sung.</a></li>
                    <li><a href="">Hơn 130 đại học công bố điểm chuẩn năm 2018.</a></li>
                    <li><a href="">Nhiều thí sinh ở các địa phương thay đổi điểm số sau khi chấm phúc khảo.</a></li>
                    <li><a href="">Danh sách các trường đã công bố điểm chuẩn đại học năm 2018.</a></li>
                </ul>

            </div>
            <div class="col-md-5 cnt1" >
                    <h3>Tạo đề thi trắc nghiệm</h3>
                    <p>Mọi người đều có thể tham gia thi miễn phí</p>
                     <form action="/aaaaaaa" method="Post">
                        <p>
                            <input type="hidden" name="save" value="1">
                            <select name="catid" id="id" onchange="getclass('')" class="f3">
                                <option value="0">Chọn môn</option>
                                <option value="1">Toán học</option>
                                <option value="2">Vật lí</option>
                                <option value="3">Hóa học</option>
                                <option value="4">Sinh học</option>
                                <option value="5">Địa lý</option>
                                <option value="6">Lịch sử </option>
                                <option value="13">Giáo dục công dân</option>
                                <option value="7">Tiếng anh</option>
                                <option value="11">Ngữ văn </option>
                                <option value="10">IQ Test </option>
                                <option value="8">Tin học </option>
                                <option value="12">Funny</option>
                                <option value="9">Giao thông</option>
                            </select>
                            <select name="catid" id="id" onchange="getclass('')" class="f3">
                                <option value="0">Số câu hỏi</option>
                                <option value="1">10 câu hỏi,15 phút</option>
                                <option value="2">15 câu hỏi,20 phút</option>
                                <option value="3">20 câu hỏi,25 phút</option>
                                <option value="4">25 câu hỏi,30 phút</option>
                                <option value="5">30 câu hỏi,35 phút</option>
                                <option value="6">35 câu hỏi,40 phút </option>
                                <option value="13">40 câu hỏi,45 phút</option>
                                <option value="7">45 câu hỏi,50 phút</option>
                                <option value="11">50 câu hỏi,55 phút </option>
                                <option value="10">55 câu hỏi,60 phút </option>
                                <option value="8">60 câu hỏi,65 phút </option>
                                
                            </select>
                            <select name="catid" id="id" onchange="getclass('')" class="f3">
                                <option value="0">Chọn lớp/cấp</option>
                                <option value="1">Lớp 1</option>
                                <option value="2">lớp 2</option>
                                <option value="3">lớp 3</option>
                                <option value="4">lớp 4</option>
                                <option value="5">lớp 5 </option>
                                <option value="6">lớp 6</option>
                                <option value="7">lớp 7</option>
                                <option value="8">lớp 8 </option>
                                <option value="9">lớp 9</option>
                                <option value="10">lớp 10 </option>
                                <option value="11">lớp 11</option>
                                <option value="12">lớp 12 </option>
                            
                            <input type="submit" value="Tao đề thi Trắc nhiệm" >
                            <hr>
                            <ul>
                                <li><a href="#">Hướng dẫn làm bài thi Trắc nghiệm</a></li>
                                <li><a href="#">Hướng dẫn chi tiết nâng cấp và đăng kí tài khoản.</a></li>
                                <li><a href="#">Danh sách các đề thi mẫu</a></li>
                                <li><a href="#">Quyền lợi thành viên.</a></li>
                            </ul>

                        </p>
                    </form>
                </div>
            </div>
        <div class="row f5" >
            <div class="col-md-8">
                <!-- Môn Toán -->
                <div class="row" >
                     <div class="col-md-10 "><h3 class="t1" >Đề thi thử Toán học</h3></div>
                     <div class="col-md-2 f5" ><button class="btn1">+Xem tất cả</button></div>
                </div>
                <hr>
                <div class="row cnt1 f6" >
                    <div class="col-md-1" ><a href="#">Lớp 3</a></div>
                    <div class="col-md-1 row_Img_cnt1"><a href="#">lớp 4</a></div>
                    <div class="col-md-1 row_Img_cnt1"><a href="#">lớp 5</a></div>
                    <div class="col-md-1 row_Img_cnt1"><a href="#">lớp 6</a></div>
                    <div class="col-md-1 row_Img_cnt1"><a href="#">lớp 7</a></div>
                    <div class="col-md-1 row_Img_cnt1"><a href="#">lớp 8</a></div>
                    <div class="col-md-1 row_Img_cnt1"><a href="#">lớp 9</a></div>
                    <div class="col-md-1 row_Img_cnt1"><a href="#">lớp 10</a></div>
                    <div class="col-md-1 row_Img_cnt1"><a href="#">lớp 11</a></div>
                    <div class="col-md-1 row_Img_cnt1"><a href="#">lớp 12</a></div>
                    <div class="col-md-2 row_Img_cnt1"><a href="#">THPT Quốc Gia</a></div>
                    
                </div>
                <div class="row f6" >
                    <div class="col-md-12">
                        <div class="box1"><a href="HocVien/LamBaiThi/1" class="link">Mã đề thi <br>#235</a></div>
                        <div class="box2">
                            
                            <p class="t2"><a href="HocVien/LamBaiThi/1">Đề thi môn Toán lớp 8(Đề 4)</a></p>
                            <p class="t3">
                                <span class="span1">20 câu hỏi</span>
                                <span class="span1">25 phút</span>
                                <a href="#">lớp 8</a>
                            </p>
                       </div>
                    </div>
                    
                </div>
                <div class="row f6" >
                    <div class="col-md-12">
                        <div class="box1"><a href="#" class="link">Mã đề thi <br>#1308</a></div>
                        <div class="box2">
                            
                            <p class="t2"><a href="#">Đề thi minh họa kì thi THPT Quốc Gia môn Toán trường THPT Tản Đà_2018</a></p>
                            <p class="t3">
                                <span class="span1">50 câu hỏi</span>
                                <span class="span1">90 phút</span>
                                <a href="#">THPT Quốc Gia</a>
                            </p>
                       </div>
                    </div>
                    
                </div>
                <div class="row f6" >
                    <div class="col-md-12">
                        <div class="box1"><a href="#" class="link">Mã đề thi <br>#1255</a></div>
                        <div class="box2">
                            
                            <p class="t2"><a href="#">Đề thi minh họa kì thi THPT Quốc Gia môn Toán 2018 mã đề 707</a></p>
                            <p class="t3">
                                <span class="span1">50 câu hỏi</span>
                                <span class="span1">90 phút</span>
                                <a href="#">THPT Quốc Gia</a>
                            </p>
                       </div>
                    </div>
                <!-- môn Vật lí -->
                </div>
                <div class="row" >
                     <div class="col-md-10"><h3 class="t1">Đề thi thử Vật lý</h3></div>
                     <div class="col-md-2 f5" ><button class="btn1">+Xem tất cả</button></div>
                    
                </div>
                <hr>
                <div class="row cnt1 f6">
                   
                    <div class="col-md-1"><a href="#">lớp 8</a></div>
                    <div class="col-md-1"><a href="#" class="row_Img_cnt1">lớp 9</a></div>
                    <div class="col-md-1"><a href="#" class="row_Img_cnt1">lớp 10</a></div>
                    <div class="col-md-1"><a href="#" class="row_Img_cnt1">lớp 11</a></div>
                    <div class="col-md-1"><a href="#" class="row_Img_cnt1">lớp 12</a></div>
                    <div class="col-md-2"><a href="#" class="row_Img_cnt1">THPT Quốc Gia</a></div>
                    
                </div>
                <div class="row f6" >
                    <div class="col-md-12">
                        <div class="box1"><a href="#" class="link">Mã đề thi <br>#235</a></div>
                        <div class="box2">
                            
                            <p class="t2"><a href="#">Đề thi môn Vật lý THPT Quốc gia lần 2 năm 2016 trường THPT Lê Lợi Thanh Hóa</a></p>
                            <p class="t3">
                                <span class="span1">50 câu hỏi</span>
                                <span class="span1">90 phút</span>
                                <a href="#">THPT Quốc Gia</a>
                            </p>
                       </div>
                    </div>
                    
                </div>
                <div class="row f6" >
                    <div class="col-md-12">
                        <div class="box1"><a href="#" class="link">Mã đề thi <br>#1203</a></div>
                        <div class="box2">
                            
                            <p class="t2"><a href="#">Đề thi thử môn Vật lý kì thi THPT Quốc Gia Nam Cao 2018 mã đề 305</a></p>
                            <p class="t3">
                                <span class="span1">50 câu hỏi</span>
                                <span class="span1">90 phút</span>
                                <a href="#">THPT Quốc Gia</a>
                            </p>
                       </div>
                    </div>
                    
                </div>
                <div class="row f6" >
                    <div class="col-md-12">
                        <div class="box1"><a href="#" class="link">Mã đề thi <br>#494</a></div>
                        <div class="box2">
                            
                            <p class="t2"><a href="#">Đề thi 15 phút áp suất môn lý lớp 8 THPT Đoàn Kết</a></p>
                            <p class="t3">
                                <span class="span1">10 câu hỏi</span>
                                <span class="span1">15 phút</span>
                                <a href="#">Lớp 8</a>
                            </p>
                       </div>
                    </div>
                    
                </div>
                <!-- Môn hóa -->
                <div class="row f5" >
                     <div class="col-md-10"><h3 class="t1">Đề thi thử Hóa học</h3></div>
                     <div class="col-md-2" class="f5"><button class="btn1">+Xem tất cả</button></div>
                    
                </div>
                <hr>
                <div class="row cnt1 f6" >
                   
                    <div class="col-md-1"><a href="#"style="">lớp 8</a></div>
                    <div class="col-md-1"><a href="#"class="row_Img_cnt1">lớp 9</a></div>
                    <div class="col-md-1"><a href="#"class="row_Img_cnt1">lớp 10</a></div>
                    <div class="col-md-1"><a href="#"class="row_Img_cnt1">lớp 11</a></div>
                    <div class="col-md-1"><a href="#"class="row_Img_cnt1">lớp 12</a></div>
                    <div class="col-md-2"><a href="#"class="row_Img_cnt1">THPT Quốc Gia</a></div>
                    
                </div>
                <div class="row f6" >
                    <div class="col-md-12">
                        <div class="box1"><a href="#" class="link">Mã đề thi <br>#296</a></div>
                        <div class="box2">
                            
                            <p class="t2"><a href="#">Đề thi thử môn Hóa học THPT Quốc gia lần 2 năm 2016 trường THPT Nguyễn Du</a></p>
                            <p class="t3">
                                <span class="span1">50 câu hỏi</span>
                                <span class="span1">90 phút</span>
                                <a href="#">Lớp 12</a>
                            </p>
                       </div>
                    </div>
                    
                </div>
                <div class="row f6">
                    <div class="col-md-12">
                        <div class="box1"><a href="#" class="link">Mã đề thi <br>#1353</a></div>
                        <div class="box2">
                            
                            <p class="t2"><a href="#">Đề kiểm tra lớp 12 môn hóa học về các chất crom,sắt,đồng,niken,kẽm,thiếc,chì,vàng,bạc(phần 6)</a></p>
                            <p class="t3">
                                <span class="span1">50 câu hỏi</span>
                                <span class="span1">60 phút</span>
                                <a href="#">Lớp 12</a>
                            </p>
                       </div>
                    </div>
                    
                </div>
                <div class="row f6" >
                    <div class="col-md-12">
                        <div class="box1"><a href="#" class="link">Mã đề thi <br>#1171</a></div>
                        <div class="box2">
                            
                            <p class="t2"><a href="#">Đề thi môn hóa học tốt nghiệp THPT Quốc Gia 2017-Mã đề 2014</a></p>
                            <p class="t3">
                                <span class="span1">40 câu hỏi</span>
                                <span class="span1">50 phút</span>
                                <a href="#">THPT Quốc Gia</a>
                            </p>
                       </div>
                    </div>
                    
                </div>
                <!-- Sinh học -->
                <div class="row" >
                     <div class="col-md-10"><h3 class="t1">Đề thi thử Sinh học</h3></div>
                     <div class="col-md-2" style="margin-top:20px;"><button class="btn1">+Xem tất cả</button></div>
                    
                </div>
                <hr>
                <div class="row cnt1 f6" >
                   
                    <div class="col-md-1"><a href="#"style="">lớp 8</a></div>
                    <div class="col-md-1"><a href="#"class="row_Img_cnt1">lớp 9</a></div>
                    <div class="col-md-1"><a href="#"class="row_Img_cnt1">lớp 10</a></div>
                    <div class="col-md-1"><a href="#"class="row_Img_cnt1">lớp 11</a></div>
                    <div class="col-md-1"><a href="#"class="row_Img_cnt1">lớp 12</a></div>
                    <div class="col-md-2"><a href="#"class="row_Img_cnt1">THPT Quốc Gia</a></div>
                    
                </div>
                <div class="row f6" >
                    <div class="col-md-12">
                        <div class="box1"><a href="#" class="link">Mã đề thi <br>#235</a></div>
                        <div class="box2">
                            
                            <p class="t2"><a href="#">Đề thi môn Sinh học THPT Quốc gia lần 2 năm 2016 trường THPT Lê Lợi Thanh Hóa</a></p>
                            <p class="t3">
                                <span class="span1">50 câu hỏi</span>
                                <span class="span1">90 phút</span>
                                <a href="#">THPT Quốc Gia</a>
                            </p>
                       </div>
                    </div>
                    
                </div>
                <div class="row f6" >
                    <div class="col-md-12">
                        <div class="box1"><a href="#" class="link">Mã đề thi <br>#1203</a></div>
                        <div class="box2">
                            
                            <p class="t2"><a href="#">Đề thi thử môn Sinh học kì thi THPT Quốc Gia Nam Cao 2018 mã đề 305</a></p>
                            <p class="t3">
                                <span class="span1">50 câu hỏi</span>
                                <span class="span1">90 phút</span>
                                <a href="#">THPT Quốc Gia</a>
                            </p>
                       </div>
                    </div>
                    
                </div>
                <div class="row f6" >
                    <div class="col-md-12">
                        <div class="box1""><a href="#" class="link">Mã đề thi <br>#494</a></div>
                        <div class="box2">
                            
                            <p class="t2"><a href="#">Đề thi 15 phút áp suất môn sinh học lớp 8 THPT Đoàn Kết</a></p>
                            <p class="t3">
                                <span class="span1">10 câu hỏi</span>
                                <span class="span1">15 phút</span>
                                <a href="#">Lớp 8</a>
                            </p>
                       </div>
                    </div>
                    
                </div>
                <!-- Địa lí -->
                <div class="row" >
                     <div class="col-md-10"><h3 class="t1">Đề thi thử Địa lí</h3></div>
                     <div class="col-md-2" style="margin-top:20px;"><button class="btn1">+Xem tất cả</button></div>
                    
                </div>
                <hr>
                <div class="row cnt1 f6" >
                   
                    <div class="col-md-1"><a href="#"style="">lớp 8</a></div>
                    <div class="col-md-1"><a href="#"class="row_Img_cnt1">lớp 9</a></div>
                    <div class="col-md-1"><a href="#"class="row_Img_cnt1">lớp 10</a></div>
                    <div class="col-md-1"><a href="#"class="row_Img_cnt1">lớp 11</a></div>
                    <div class="col-md-1"><a href="#"class="row_Img_cnt1">lớp 12</a></div>
                    <div class="col-md-2"><a href="#"class="row_Img_cnt1">THPT Quốc Gia</a></div>
                    
                </div>
                <div class="row f6" >
                    <div class="col-md-12">
                        <div class="box1"><a href="#" class="link">Mã đề thi <br>#235</a></div>
                        <div class="box2">
                            
                            <p class="t2"><a href="#">Đề thi môn Địa lý THPT Quốc gia lần 2 năm 2016 trường THPT Lê Lợi Thanh Hóa</a></p>
                            <p class="t3">
                                <span class="span1">50 câu hỏi</span>
                                <span class="span1">90 phút</span>
                                <a href="#">THPT Quốc Gia</a>
                            </p>
                       </div>
                    </div>
                    
                </div>
                <div class="row f6" >
                    <div class="col-md-12">
                        <div class="box1"><a href="#" class="link">Mã đề thi <br>#1203</a></div>
                        <div class="box2">
                            
                            <p class="t2"><a href="#">Đề thi thử môn Địa lý lý kì thi THPT Quốc Gia Nam Cao 2018 mã đề 305</a></p>
                            <p class="t3">
                                <span class="span1">50 câu hỏi</span>
                                <span class="span1">90 phút</span>
                                <a href="#">THPT Quốc Gia</a>
                            </p>
                       </div>
                    </div>
                    
                </div>
                <div class="row f6" >
                    <div class="col-md-12">
                        <div class="box1"><a href="#" class="link">Mã đề thi <br>#494</a></div>
                        <div class="box2">
                            
                            <p class="t2"><a href="#">Đề thi 15 phút áp suất môn Địa lý lớp 8 THPT Đoàn Kết</a></p>
                            <p class="t3">
                                <span class="span1">10 câu hỏi</span>
                                <span class="span1">15 phút</span>
                                <a href="#">Lớp 8</a>
                            </p>
                       </div>
                    </div>
                    
                </div>
                <!-- Lịch sử -->
                <div class="row" >
                     <div class="col-md-10"><h3 class="t1">Đề thi thử Lịch sử</h3></div>
                     <div class="col-md-2" style="margin-top:20px;"><button class="btn1">+Xem tất cả</button></div>
                    
                </div>
                <hr>
                <div class="row cnt1 f6" >
                   
                    <div class="col-md-1"><a href="#"style="">lớp 8</a></div>
                    <div class="col-md-1"><a href="#"class="row_Img_cnt1">lớp 9</a></div>
                    <div class="col-md-1"><a href="#"class="row_Img_cnt1">lớp 10</a></div>
                    <div class="col-md-1"><a href="#"class="row_Img_cnt1">lớp 11</a></div>
                    <div class="col-md-1"><a href="#"class="row_Img_cnt1">lớp 12</a></div>
                    <div class="col-md-2"><a href="#"class="row_Img_cnt1">THPT Quốc Gia</a></div>
                    
                </div>
                <div class="row f6" >
                    <div class="col-md-12">
                        <div class="box1"><a href="#" class="link">Mã đề thi <br>#235</a></div>
                        <div class="box2">
                            
                            <p class="t2"><a href="#">Đề thi môn Lịch sử THPT Quốc gia lần 2 năm 2016 trường THPT Lê Lợi Thanh Hóa</a></p>
                            <p class="t3">
                                <span class="span1">50 câu hỏi</span>
                                <span class="span1">90 phút</span>
                                <a href="#">THPT Quốc Gia</a>
                            </p>
                       </div>
                    </div>
                    
                </div>
                <div class="row f6" >
                    <div class="col-md-12">
                        <div class="box1"><a href="#" class="link">Mã đề thi <br>#1203</a></div>
                        <div class="box2">
                            
                            <p class="t2"><a href="#">Đề thi thử môn Lịch sử kì thi THPT Quốc Gia Nam Cao 2018 mã đề 305</a></p>
                            <p class="t3">
                                <span class="span1">50 câu hỏi</span>
                                <span class="span1">90 phút</span>
                                <a href="#">THPT Quốc Gia</a>
                            </p>
                       </div>
                    </div>
                    
                </div>
                <div class="row f6" >
                    <div class="col-md-12">
                        <div class="box1"><a href="#" class="link">Mã đề thi <br>#494</a></div>
                        <div class="box2">
                            
                            <p class="t2"><a href="#">Đề thi 15 phút áp suất môn Lịch sử lớp 8 THPT Đoàn Kết</a></p>
                            <p class="t3">
                                <span class="span1">10 câu hỏi</span>
                                <span class="span1">15 phút</span>
                                <a href="#">Lớp 8</a>
                            </p>
                       </div>
                    </div>
                    
                </div>
                <!-- Giáo dục công dân -->
                <div class="row" >
                     <div class="col-md-10"><h3 class="t1">Đề thi thử Giáo dục công dân</h3></div>
                     <div class="col-md-2" style="margin-top:20px;"><button class="btn1">+Xem tất cả</button></div>
                    
                </div>
                <hr>
                <div class="row cnt1 f6" >
                   
                    <div class="col-md-1"><a href="#"style="">lớp 8</a></div>
                    <div class="col-md-1"><a href="#"class="row_Img_cnt1">lớp 9</a></div>
                    <div class="col-md-1"><a href="#"class="row_Img_cnt1">lớp 10</a></div>
                    <div class="col-md-1"><a href="#"class="row_Img_cnt1">lớp 11</a></div>
                    <div class="col-md-1"><a href="#"class="row_Img_cnt1">lớp 12</a></div>
                    <div class="col-md-2"><a href="#"class="row_Img_cnt1">THPT Quốc Gia</a></div>
                    
                </div>
                <div class="row f6" >
                    <div class="col-md-12">
                        <div class="box1"><a href="#" class="link">Mã đề thi <br>#235</a></div>
                        <div class="box2">
                            
                            <p class="t2"><a href="#">Đề thi môn GDCD THPT Quốc gia lần 2 năm 2016 trường THPT Lê Lợi Thanh Hóa</a></p>
                            <p class="t3">
                                <span class="span1">50 câu hỏi</span>
                                <span class="span1">90 phút</span>
                                <a href="#">THPT Quốc Gia</a>
                            </p>
                       </div>
                    </div>
                    
                </div>
                <div class="row f6" >
                    <div class="col-md-12">
                        <div class="box1"><a href="#" class="link">Mã đề thi <br>#1203</a></div>
                        <div class="box2">
                            
                            <p class="t2"><a href="#">Đề thi thử môn GDCD kì thi THPT Quốc Gia Nam Cao 2018 mã đề 305</a></p>
                            <p class="t3">
                                <span class="span1">50 câu hỏi</span>
                                <span class="span1">90 phút</span>
                                <a href="#">THPT Quốc Gia</a>
                            </p>
                       </div>
                    </div>
                    
                </div>
                <div class="row f6" >
                    <div class="col-md-12">
                        <div class="box1"><a href="#" class="link">Mã đề thi <br>#494</a></div>
                        <div class="box2">
                            
                            <p class="t2"><a href="#">Đề thi 15 phút áp suất môn GDCD lớp 8 THPT Đoàn Kết</a></p>
                            <p class="t3">
                                <span class="span1">10 câu hỏi</span>
                                <span class="span1">15 phút</span>
                                <a href="#">Lớp 8</a>
                            </p>
                       </div>
                    </div>
                    
                </div>
                <!-- Tiếng anh -->
                <div class="row" >
                     <div class="col-md-10"><h3 class="t1">Đề thi thử Tiếng anh</h3></div>
                     <div class="col-md-2" style="margin-top:20px;"><button class="btn1">+Xem tất cả</button></div>
                    
                </div>
                <hr>
                <div class="row cnt1 f6" >
                   
                    <div class="col-md-1"><a href="#"style="">lớp 8</a></div>
                    <div class="col-md-1"><a href="#"class="row_Img_cnt1">lớp 9</a></div>
                    <div class="col-md-1"><a href="#"class="row_Img_cnt1">lớp 10</a></div>
                    <div class="col-md-1"><a href="#"class="row_Img_cnt1">lớp 11</a></div>
                    <div class="col-md-1"><a href="#"class="row_Img_cnt1">lớp 12</a></div>
                    <div class="col-md-2"><a href="#"class="row_Img_cnt1">THPT Quốc Gia</a></div>
                    
                </div>
                <div class="row f6" >
                    <div class="col-md-12">
                        <div class="box1"><a href="#" class="link">Mã đề thi <br>#235</a></div>
                        <div class="box2">
                            
                            <p class="t2"><a href="#">Đề thi môn Tiếng anh THPT Quốc gia lần 2 năm 2016 trường THPT Lê Lợi Thanh Hóa</a></p>
                            <p class="t3">
                                <span class="span1">50 câu hỏi</span>
                                <span class="span1">90 phút</span>
                                <a href="#">THPT Quốc Gia</a>
                            </p>
                       </div>
                    </div>
                    
                </div>
                <div class="row f6" >
                    <div class="col-md-12">
                        <div class="box1"><a href="#" class="link">Mã đề thi <br>#1203</a></div>
                        <div class="box2">
                            
                            <p class="t2"><a href="#">Đề thi thử môn Tiếng anh kì thi THPT Quốc Gia Nam Cao 2018 mã đề 305</a></p>
                            <p class="t3">
                                <span class="span1">50 câu hỏi</span>
                                <span class="span1">90 phút</span>
                                <a href="#">THPT Quốc Gia</a>
                            </p>
                       </div>
                    </div>
                    
                </div>
                <div class="row f6" >
                    <div class="col-md-12">
                        <div class="box1"><a href="#" class="link">Mã đề thi <br>#494</a></div>
                        <div class="box2">
                            
                            <p class="t2"><a href="#">Đề thi 15 phút áp suất môn Tiếng anh lớp 8 THPT Đoàn Kết</a></p>
                            <p class="t3">
                                <span class="span1">10 câu hỏi</span>
                                <span class="span1">15 phút</span>
                                <a href="#">Lớp 8</a>
                            </p>
                       </div>
                    </div>
                    
                </div>
                <!-- Ngữ văn -->
                <div class="row" >
                     <div class="col-md-10"><h3 class="t1">Đề thi thử Ngữ văn</h3></div>
                     <div class="col-md-2" style="margin-top:20px;"><button class="btn1">+Xem tất cả</button></div>
                    
                </div>
                <hr>
                <div class="row cnt1 f6" >
                   
                    <div class="col-md-1"><a href="#">lớp 8</a></div>
                    <div class="col-md-1"><a href="#"class="row_Img_cnt1">lớp 9</a></div>
                    <div class="col-md-1"><a href="#"class="row_Img_cnt1">lớp 10</a></div>
                    <div class="col-md-1"><a href="#"class="row_Img_cnt1">lớp 11</a></div>
                    <div class="col-md-1"><a href="#"class="row_Img_cnt1">lớp 12</a></div>
                    <div class="col-md-2"><a href="#"class="row_Img_cnt1">THPT Quốc Gia</a></div>
                    
                </div>
                <div class="row f6" >
                    <div class="col-md-12">
                        <div class="box1"><a href="#" class="link">Mã đề thi <br>#235</a></div>
                        <div class="box2">
                            
                            <p class="t2"><a href="#">Đề thi môn Ngữ văn THPT Quốc gia lần 2 năm 2016 trường THPT Lê Lợi Thanh Hóa</a></p>
                            <p class="t3">
                                <span class="span1">50 câu hỏi</span>
                                <span class="span1">90 phút</span>
                                <a href="#">THPT Quốc Gia</a>
                            </p>
                       </div>
                    </div>
                    
                </div>
                <div class="row f6" >
                    <div class="col-md-12">
                        <div class="box1"><a href="#" class="link">Mã đề thi <br>#1203</a></div>
                        <div class="box2">
                            
                            <p class="t2"><a href="#">Đề thi thử môn Ngữ văn kì thi THPT Quốc Gia Nam Cao 2018 mã đề 305</a></p>
                            <p class="t3">
                                <span class="span1">50 câu hỏi</span>
                                <span class="span1">90 phút</span>
                                <a href="#">THPT Quốc Gia</a>
                            </p>
                       </div>
                    </div>
                    
                </div>
                <div class="row f6" >
                    <div class="col-md-12">
                        <div class="box1"><a href="#" class="link">Mã đề thi <br>#494</a></div>
                        <div class="box2">
                            
                            <p class="t2"><a href="#">Đề thi 15 phút áp suất môn Ngữ văn lớp 8 THPT Đoàn Kết</a></p>
                            <p class="t3">
                                <span class="span1">10 câu hỏi</span>
                                <span class="span1">15 phút</span>
                                <a href="#">Lớp 8</a>
                            </p>
                       </div>
                    </div>
                    
                </div>
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