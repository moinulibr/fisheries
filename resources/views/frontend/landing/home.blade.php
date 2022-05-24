@extends('frontend.layouts.landing')

@section('fronten-content')
    

<div class="app-contant">

    <div class="news-ticker">
        <div class="container">
            <div class="ticker-wrap">
                <!--div class="ticker-heading">Breaking News</div-->
                <div class="ticker" style="-webkit-animation-duration: {{$setting->scroll_speed}};animation-duration: {{$setting->scroll_speed}};">
                    @foreach ($scrolls as $item)
                    <div class="ticker__item"> {{$item->title}} </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>

    <div class="serch-box">
        <div class="input-group rounded">
            <input type="search" class="form-control rounded" placeholder="প্রয়োজনীয় সেবার নাম লিখুন" aria-label="Search" aria-describedby="search-addon" />
            <span class="input-group-text" id="search-addon">
                <i class="fa fa-search"></i>
            </span>
        </div>
    </div>
    <div class="mCat-box">
        <div class="container">
            <div class="d-flex align-items-center justify-content-center">
                <p class="box-heading"> প্রয়োজনীয় অন্যান্য সেবা </p>
            </div>
            <div class="service-box">
                <a href="main-category.php" class="box">
                    <div class="inner">
                        <img src="https://akkbd.com/wp-content/uploads/2020/04/Pond_Fish_provatferi-2019-10-15-13-22-05.jpg" alt="image" class="rounded-xl shadow-l gradient-blue" />
                    </div>
                    <p class="mCattext">মৎস্য</p>
                </a>

                <a href="livestock.php" class="box">
                    <div class="inner">
                        <img src="https://st2.depositphotos.com/3316565/8382/i/950/depositphotos_83824976-stock-photo-baby-calf-drinking-mothers-milk.jpg" alt="image" class="rounded-xl shadow-l gradient-blue" />
                    </div>
                    <p class="mCattext">প্রাণিসম্পদ</p>
                </a>

                <a href="training.php" class="box">
                    <div class="inner">
                        <img src="https://www.khaboronline.com/wp-content/uploads/2021/06/fish-1.jpg" alt="image" class="rounded-xl shadow-l gradient-blue" />
                    </div>
                    <p class="mCattext">প্রশিক্ষণ</p>
                </a>
                <a href="main-category.php" class="box">
                    <div class="inner">
                        <img src="https://i0.wp.com/www.inventiva.co.in/wp-content/uploads/2021/10/samudrayaan.jpg" alt="image" class="rounded-xl shadow-l gradient-blue" />
                    </div>
                    <p class="mCattext">সুনীল অর্থনীতি</p>
                </a>

                <a href="main-category.php" class="box">
                    <div class="inner">
                        <img src="https://bnanews24.com/wp-content/uploads/2022/01/IMG_06012022_234606_700_x_400_pixel.jpg" alt="image" class="rounded-xl shadow-l gradient-blue" />
                    </div>
                    <p class="mCattext"> নোটিশ </p>
                </a>

                <a href="main-category.php" class="box">
                    <div class="inner">
                        <img src="https://dalitvoice24.com/wp-content/uploads/2022/02/Deshi-Fish-Cultivate-pic-2--940x570.jpg" alt="image" class="rounded-xl shadow-l gradient-blue" />
                    </div>
                    <p class="mCattext">চলমান প্রকল্প</p>
                </a>
                <a href="main-category.php" class="box">
                    <div class="inner">
                        <img src="/img/bike.jpg" alt="image" class="rounded-xl shadow-l gradient-blue" />
                    </div>
                    <p class="mCattext"> ইনোভেশন </p>
                </a>

                <a href="main-category.php" class="box">
                    <div class="inner">
                        <img src="/img/license.jpg" alt="image" class="rounded-xl shadow-l gradient-blue" />
                    </div>
                    <p class="mCattext">  লাইসেন্সিং  </p>
                </a>

                <a href="main-category.php" class="box">
                    <div class="inner">
                        <img src="/img/tika.jpg" alt="image" class="rounded-xl shadow-l gradient-blue" />
                    </div>
                    <p class="mCattext">   টিকা কার্যক্রম   </p>
                </a>
                <a href="main-category.php" class="box">
                    <div class="inner">
                        <img src="https://motshoprani.org/wp-content/uploads/2021/06/received_499592521273481.jpeg" alt="image" class="rounded-xl shadow-l gradient-blue" />
                    </div>
                    <p class="mCattext">উন্নয়ন তথ্য</p>
                </a>

                <a href="main-category.php" class="box">
                    <div class="inner">
                        <img src="https://dailyrangamati.com/wp-content/uploads/2021/10/dr-mati-Photo-2_31.10.2021-265x198.jpg" alt="image" class="rounded-xl shadow-l gradient-blue" />
                    </div>
                    <p class="mCattext">প্রেস বিজ্ঞপ্তি</p>
                </a>

                <a href="main-category.php" class="box">
                    <div class="inner">
                        <img src="https://www.abnews24.com/assets/news_photos/2020/04/03/image-72161-1585881882.jpg" alt="image" class="rounded-xl shadow-l gradient-blue" />
                    </div>
                    <p class="mCattext">হটলাইন</p>
                </a>
            </div>
        </div>
    </div>

    <div class="spach" style="height:30px"></div>

    <div class="second-section">
        <div class="container">
            <div class="row">
                <div class="text-center">
                    <img src="https://rajonahmed.pw/img/3.png" alt="image" style="width:100%; height: auto;" class="rounded-xl shadow-l gradient-blue" />
                </div>
            </div>
        </div>
    </div>

    <div class="spach" style="height:30px"></div>
    
    <div class="spacial-box">
        <div class="container">
            <div class="d-flex align-items-center justify-content-center">
                <p class="box-heading"> মৎস্য ও প্রানিসম্পদ বিশেষ সেবা </p>
            </div>
            <div class="mainbox">
                <a href="main-category.php" class="content">
                    <div class="inner">
                        <img src="https://akkbd.com/wp-content/uploads/2020/04/Pond_Fish_provatferi-2019-10-15-13-22-05.jpg" alt="image" class="rounded-xl shadow-l gradient-blue" />
                    </div>
                    <p class="mCattext">  রোগ ও চিকিৎসা </p>
                </a>
                <a href="livestock.php" class="content">
                    <div class="inner">
                        <img src="https://st2.depositphotos.com/3316565/8382/i/950/depositphotos_83824976-stock-photo-baby-calf-drinking-mothers-milk.jpg" alt="image" class="rounded-xl shadow-l gradient-blue" />
                    </div>
                    <p class="mCattext">  প্রকাশনা  </p>
                </a>
                <a href="livestock.php" class="content">
                    <div class="inner">
                        <img src="https://st2.depositphotos.com/3316565/8382/i/950/depositphotos_83824976-stock-photo-baby-calf-drinking-mothers-milk.jpg" alt="image" class="rounded-xl shadow-l gradient-blue" />
                    </div>
                    <p class="mCattext">  হ্যচারি ও খামার নিবন্ধন  </p>
                </a>
            </div>
        </div>
    </div>

    <div class="spach" style="height:30px"></div>

    <div class="important-link">
        <div class="container" style="margin-bottom: 10px;">
            <div class="d-flex align-items-center justify-content-center">
                <p class="box-heading"> গুরুর্তপূর্ন লিঙ্ক সমূহ </p>
            </div>
            <div class="two-box-inner">
                <ul class="square-style">
                    @foreach ($importantLinks as $item)
                    <li>
                        <a href="{{$item->side_url}}" target="_blank" title="{{$item->link_name}}">{{$item->link_name}}</a>
                    </li>
                    @endforeach
                </ul>

            </div>
        </div>
    </div>
    <div class="spach" style="height:30px"></div>
    <div class="other-services">
        <div class="container">
            <div class="d-flex align-items-center justify-content-center">
                <p class="box-heading"> প্রয়োজনীয় অন্যান্য সেবা </p>
            </div>
            <div class="box-inner">
                @foreach ($otherServices as $item)    
                <a href="{{$item->side_url}}" target="_blank" class="box">
                    <div class="inner">
                        <img src="{{ asset('storage/other-service/'.$item->photo) }}" alt="image" class="rounded-xl shadow-l gradient-blue" />
                    </div>
                    <p class="mCattext">{{$item->title}} </p>
                </a>
                @endforeach
            </div>
        </div>
    </div>
</div>

@endsection