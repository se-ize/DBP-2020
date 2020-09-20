컴퓨터공학과 20180967 김서현
##  &#10004;새로 배운 내용
- 서버는 기본적으로 html 해석 기능이 있다.
- 여러가지 중복되는 작업을 해야하는 경우, 개발자가 직접 태그를 바꾸는 것이 아니라 자동으로 태그를 만들어주는 PHP 태그를 이용한다.
- 웹서버는 PHP에게 코드를 해석해달라고 요청하고, PHP는 DB에 저장된 값을 읽어오거나, DB에 요청하고 data를 받으면 HTML 코드로 해석해 웹 서버에 전송한다
- 클라이언트는 최종적으로 완성된 웹 페이지를 보게 된다.
- GET 형식은 URL 주소 자체에 보내주고 싶은 정보를 넣는 방식으로, 누구나 볼 수 있어서 보안이 취약하지만 직관적이고 명확하다.
- POST 형식은 정보를 숨겨주는 방식으로, GET 형식보다 보안이 유리하다.
- mysqli_connect() 함수는 mysql에 연결해준다.
- mysqli_query() 함수는 두 번째 인자인 연결 식별자가 지시하는 DB에 접속하여 첫 번째 인자로 명시되어 있는 SQL 쿼리문을 실행하는 함수이다.
- mysqli_error() 함수는 오류나면 false를 반환한다.
- error_log() 함수는 관리자가 볼 수 있는 로그파일로 저장한다.
- mysqli_fetch_array() 함수는 첫 번째부터 하나씩 차례로 알려준다.
##  &#10004;문제가 발생하거나 고민한 내용 + 해결 과정
**1. 교수님과 동일한 코드를 작성했으나 Undefined index 오류가 발생했다.**
![Screenshot_2020-09-11-17-30-10 (2)](https://user-images.githubusercontent.com/70623290/93707820-9f8bcb00-fb6c-11ea-950c-21b2bcdcc16d.png)
php.ini 파일에서 error_reporing = ... & ~E_NOTICE로 변경 후 해결됐다.

**2. description 내용이 홈페이지에 출력되지 않았으나, 문법적 오류가 발생하지 않았다.**
![SmartSelectImage_2020-09-11-18-27-57](https://user-images.githubusercontent.com/70623290/93707812-8f73eb80-fb6c-11ea-975b-d4f9bbea8811.png)
descrption으로 오타가 난 부분을 수정한 후 해결됐다.

##  &#10004;참고할 만한 내용
https://tutorialpost.apptilus.com/code/posts/tools/markdown01-syntax/ 마크다운 문법
https://www.w3schools.com/charsets/ref_emoji.asp html 이모티콘
https://coding-factory.tistory.com/244 Git bash를 이용한 push 방법
https://opentutorials.org/course/3167/19591 생활코딩

##  &#10004;회고(+,-,!)
*교수님이 열심히 가르쳐주시는게 느껴져서 좋았다(+)*
*교수님과 똑같이 했다고 생각했는데 자꾸 오류가 발생해 힘들었다(-)*
*PHP와 mySQL를 이용해서 서버에 연동하는 것을 성공해 뿌듯했다(!)*
