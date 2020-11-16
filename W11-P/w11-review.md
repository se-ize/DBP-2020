컴퓨터공학과 20180967 김서현
##  &#10004;새로 배운 내용
- JDBC는 자바에서 db로 쿼리문을 전송할 때 사용할 수 있는 인터페이스이다.
- JDBC에는 Statement, PreparedStatement, CallableStatement가 있고, 사용할 때 반드시 예외처리를 해야한다.
- Statement는 실행할때마다 전달하는 정적 메소드로, 미리 입력된 쿼리문을 실행한다.
- PreparedStatement는 Statement를 보완해서 만든 것으로, 실행시간동안 인수값을 위한 공간을 확보하고, 먼저 컴파일하는 동적 메소드이고, 한번 분석되고나면 재사용 가능하고,
실행속도가 빠르고, 기호를 신경쓰지 않아도 돼서 작은따옴표를 그대로 해석하고, 위치홀더(placeholder)는 
여러 개의 인수를 넣을때나 값이 계속 변할 때 사용한다.
- close() 메소드를 호출해 자원을 반납하지 않으면 DB서버가 해당 SQL문의 결과를 계속 저장해야해서 메모리가 낭비된다.

##  &#10004;문제가 발생하거나 고민한 내용 + 해결 과정
**1. select * from (select * from employees order by rownum DESC) where rownum = 1; 이클립스에서 마지막 row를 조회하지 않았다**

select e.* from (select a.* from departments a order by a.department_id DESC) e where rownum = 1;로 수정해 해결했다.


##  &#10004;참고할 만한 내용

없음

##  &#10004;회고(+,-,!)
*이클립스로 SQL을 구현하는 과정이 재미있었다.(+)*

*이클립스에서 사소한 오류가 발생해서 시간을 지연했다.(-)*

*교수님 말씀대로 여러 실행환경을 설치해서 재밌는 것을 찾아야겠다. 아직까지는 내가 가장 재밌어하는게 무엇인지 잘 모르겠다.(!)*


##  &#10004;동작 화면
https://youtu.be/klh6ekTsnpo
