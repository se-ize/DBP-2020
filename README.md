##  &#10004;과제 사이트 및 동작영상
전국평생학습강좌
동작화면 영상

##  &#10004;참여자
7조 김수연, 김아린, 김서현, 전민주, 차소희

##  &#10004;주제선정 이유
전국의 평생학습강좌를 한 번에 보여주는 홈페이지가 없는 걸로 알고 있고, 사람들이 평생학습강좌를 찾아보고 등록하기 위해서 구청이나 시청 홈페이지를 따로 들어가야하는 과정이 번거롭고 불편하기 때문이다. 특히 서울 같은 경우에는 구마다 강좌가 여러 개 있는데, 서울 지역에 있는 강좌를 한 번에 보여준다면, 원하는 강좌를 찾아서 갈 수 있으므로 더 유용할 것이다.

##  &#10004;프로젝트 목적
요즘 코로나로 인해 사람들이 집에서 무료하게 있는 시간이 많아져 DIY, 온라인클래스 등이 유행하면서 자기개발을 하고자 하는 사람들이 늘고 있다. 누구나 평생학습강좌 홈페이지에 접속해 자신의 지역에 있는 평생학습강좌들을 쉽게 찾아볼 수 있게 하고, 사람들에게 평생학습강좌에 대한 접근성을 높여 평생학습강좌를 몰랐던 사람들이 더 많은 관심을 갖게 하고, 자기개발에 도움을 주도록 한다.

##  &#10004;프로젝트 기능
  &nbsp; **1. 강좌 안내**
  
![아비](https://user-images.githubusercontent.com/70623290/101924347-e8a36680-3c13-11eb-9db2-e1b4c3dc7f9e.png)
![손뜨개 - Chrome 2020-12-12 오전 1_01_57](https://user-images.githubusercontent.com/70623290/101925905-c874a700-3c15-11eb-8dff-9ab4b7ac16cb.png)

지역을 선택하고 검색하면 각 지역에 맞는 강좌들을 한 페이지당 10개씩 보여주고, 강좌명을 누르면 해당 강좌의 상세정보를 보여준다.

  &nbsp; **2. 맞춤강좌 찾기**
  
![아비 (6)](https://user-images.githubusercontent.com/70623290/101924600-39b35a80-3c14-11eb-970f-28a507edc5d9.png)

지역, 대상, 요일, 시간대, 온/오프라인, 수강료에서 전체 혹은 검색 원하는 조건을 선택하고 검색하면 조건에 맞는 강좌들을 한 페이지당 10개씩 보여주고, 강좌명을 누르면 해당 강좌의 상세정보를 보여준다.

  &nbsp; **3. 강좌등록**
  
![아비 (11)](https://user-images.githubusercontent.com/70623290/101925642-703da500-3c15-11eb-988b-831e96704975.png)
![아비 (8)](https://user-images.githubusercontent.com/70623290/101925650-729fff00-3c15-11eb-82b6-6febb7a3986e.png)

등록할 강좌의 상세정보를 입력하고 강좌등록 버튼을 누르면 강좌가 등록된다.

  &nbsp; **4. 강좌수정/삭제**
  
![아비 (4)](https://user-images.githubusercontent.com/70623290/101924367-ef31de00-3c13-11eb-99ec-2fd1b4c41675.png)
![아비 (7)](https://user-images.githubusercontent.com/70623290/101924609-3b7d1e00-3c14-11eb-8173-deb4090af2d0.png)

강좌명과 강사명으로 수정이나 삭제하고 싶은 강좌를 검색할 수 있도록 한다. 수정버튼을 통해 수정 후, 강좌 상세화면으로 이동하여 수정사항을 바로 확인할 수 있다. 강좌번호는 primary key로 수정할 수 없게 막아두었다. 강좌의 삭제버튼을 누르면 강좌가 바로 삭제된다. 수정/삭제 기능은 강좌 상세화면에서도 버튼으로 제공된다.

##  &#10004;기능별 역할분담
조회기능 – 김서현, 김수연 / 수정기능 – 김아린 / 삭제기능 – 전민주 / 추가기능 – 차소희

##  &#10004;구축 환경
Dothome(호스팅), mySQL, PHP, HTML, 윈도우

##  &#10004;데이터 수집방법
CSV 형식의 공공데이터를 다운받아 Navicat 프로그램을 이용해 mySQL에 import했다.
mySQL에 import한 데이터를 .sql 형식으로 export해서 phpMyAdmin 데이터베이스에 import했다.

##  &#10004;테이블명과 데이터타입
- 강좌번호: id int(11) primary key
- 강좌명: course_name varchar(1000)
- 강사명: teacher_name varchar(1000)
- 교육시작일: start_date date
- 교육종료일: finish_date date
- 교육시작시각: start_time varchar(50)
- 교육종료시각: finish_time varchar(50)
- 강좌내용: category varchar(1000)
- 교육대상: target varchar(100)
- 교육방법: on_off varchar(256)
- 운영요일: day varchar(256)
- 교육장소: place varchar(1000)
- 강좌정원: capacity int(4)
- 수강료: price int(7)
- 교육장 도로명주소: address varchar(256)
- 운영기관: agency varchar(256)
- 운영기관 전화번호: agency_phone varchar(50)
- 접수시작일: receipt_start date
- 접수종료일: receipt_finish date
- 접수방법: receipt_method varchar(1000)
- 선정방법: select_method varchar(256)
- 홈페이지: website varchar(1000)
- 능력개발훈련비 지원강좌여부: support varchar(3)
- 학점은행제평가(학점) 인정여부: academic varchar(3)
- 학습계좌제평가 인정여부: learning_account varchar(3)
- 데이터기준일자: data_date date
- 제공기관코드: provider_code int(8)
- 제공기관명: provider_name varchar(50)
