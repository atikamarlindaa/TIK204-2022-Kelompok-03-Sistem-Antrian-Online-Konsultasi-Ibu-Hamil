import 'package:flutter/material.dart';
import 'package:get/get.dart';
import 'package:rpl/layar/antrean.dart';
import 'package:rpl/layar/halaman_daftar.dart';
// import 'package:logintunisia/screens/signUpScreen.dart';
import 'package:easy_sidemenu/easy_sidemenu.dart';
import 'package:rounded_expansion_tile/rounded_expansion_tile.dart';
import 'package:toggle_switch/toggle_switch.dart';

PageController page = PageController();

final List lis  =['21 - 04 -2077', '22 - 04 -2077','23 - 04 -2077'];
final List lis1 =['''21
Senin''','''22
Selasa''','''23
Rabu''','''24
Senin''','''25
Senin'''];
final List lis2 =['''Pagi, 10:00 AM''','''Siang, 14:00 PM''','''Malam, 19:00 PM''' ];


var tanggal = '';
var jam = '';
int book = 0;

class Dokter extends StatelessWidget {

  @override
  Widget build(BuildContext context) {
    return Padding(
      padding: EdgeInsets.fromLTRB(0, 0, 0, 10),
    child:
    Container(
        height: 84,
        width: 1000,
        child: Row(
          children: [
          Image.asset('assets/images/foto.png'),
          Text("dr. Budi Martyanto",style: TextStyle(
            //color: Color.fromARGB(255, 76, 78, 79)
          ),),
          ToggleSwitch(
                      minWidth: 90.0,
                      minHeight: 84,
                      initialLabelIndex: 2,
                      customWidths: [62,62,62,62,62],
                      cornerRadius: 5.0,
                      activeBgColor: [Color.fromARGB(255, 51, 45, 104),],
                      activeFgColor: Colors.white,
                      inactiveBgColor: Colors.white,
                      inactiveFgColor: Colors.grey[900],
                      totalSwitches: 3,
                      labels: [lis1[0],lis1[1],lis1[2]],
                      borderWidth: 2.0,
                      borderColor: [Colors.white],
                      onToggle: (index) {
                        int square(index) {
  assert(index != null); // for debugging
  if (index == null) throw Exception();
  return index;
}
var a = square(index);
print(a);
print(lis[a]);
tanggal = lis[a];

                      },
                    ),
                                      ToggleSwitch(
                      minWidth: 90.0,
                      minHeight: 84,
                      initialLabelIndex: 2,
                      cornerRadius: 5.0,
                      customWidths: [155, 155.0,155.0],
                      activeBgColor: [Color.fromARGB(255, 51, 45, 104),],
                      activeFgColor: Colors.white,
                      inactiveBgColor: Colors.white,
                      inactiveFgColor: Colors.grey[900],
                      totalSwitches: 3,
                      labels: ['''Pagi
10:00 AM''','''Siang
14:00 PM''' ,'''Malam
19:00 PM'''],
                      iconSize: 30.0,
                      borderWidth: 2.0,
                      borderColor: [Colors.white],

                      onToggle: (index) {
                        print('switched to: $index');
                         int square(index) {
  assert(index != null); // for debugging
  if (index == null) throw Exception();
  return index;
}
var a = square(index);
print(a);
print(lis2[a]);
jam = lis2[a];
                      },
                    ),
        SizedBox(width: 20,),
        Container(
                    height: 84,
                    width: 107,
                    child: TextButton(
                        style: TextButton.styleFrom( 
                        alignment: Alignment.center,
                        ),
                        onPressed: () { 
                          book = 1;
                          page.animateToPage(
                        2,
                        duration: const Duration(milliseconds: 400),
                        curve: Curves.easeInOut,
                      );
                      
                        },
                        child: Text(
                          "BOOKING",
                          style: TextStyle(
                            color: Color.fromARGB(255, 255, 255, 255),
                            
                          ),
                ),
                ),
                    decoration: BoxDecoration(
                      //border: Border.all(color: Color.fromARGB(255, 51, 45, 104)),
                      borderRadius: BorderRadius.only(
                        topRight : Radius.circular(20.0),
                        bottomRight: Radius.circular(20.0)),
                    color: Color.fromARGB(255, 51, 45, 104),
                    )
                    ),

          ],
        ),
        decoration: BoxDecoration(
           border: Border.all(color: Color.fromARGB(255, 51, 45, 104),width: 2),
           borderRadius: BorderRadius.all(Radius.circular(20.0)),
        color: Color.fromARGB(255, 255, 255, 255),
        
        
      ),
    ));
  }
}



final List<Widget> dokter = [
  Dokter(),
  Dokter(),
  Dokter(),
  Dokter(),
  Dokter(),
  Dokter(),
  Dokter(),
  Dokter(),
  Dokter(),
  Dokter(),
  Dokter(),
];









class Utama extends StatefulWidget {
  const Utama({Key? key}) : super(key: key);
 
  @override
  State<Utama> createState() => _Utama();
}
 
class _Utama extends State<Utama> {
  TextEditingController nameController = TextEditingController();
  TextEditingController passwordController = TextEditingController();
  //PageController page = PageController();

  
 
  @override
  var b = "blue";
  
  Widget build(BuildContext context) {
  
    return MaterialApp(
     home: Scaffold(
     
      body :
      Align(
        alignment: Alignment.center,
        child:

    Container(
        alignment: Alignment.center,
        height: 700,
        width: 1400,
        decoration: BoxDecoration(
                    color :Color.fromARGB(255, 205, 227, 238)
                  ),
        child: Column(
          children: [
            Container(
               height:70,
                width: 1400,
                decoration: BoxDecoration(
                    color: Colors.white,
                    boxShadow: [
      BoxShadow(
        color: Colors.grey,
                    blurRadius: 5,
                    spreadRadius: 1,
                    offset: Offset(4, 4)
        ),],
                  ),
        child: Row(
          children: [
            Padding(padding: EdgeInsets.fromLTRB(10,0,10,0),
            child:
            Text("Konsultasi Kehamilan", style: TextStyle(
              fontSize: 25, fontWeight: FontWeight.bold,color: Color.fromARGB(255, 51, 45, 104),
            ),)),
            Icon(Icons.list, size: 30,),
            SizedBox(width: 100),
            SizedBox(
                      height: 41,
                      width: 370,
                      child: TextField(
                        decoration: InputDecoration(
                        filled: true,
                        fillColor: Colors.white,
                        enabledBorder: OutlineInputBorder(
                        borderSide: BorderSide(color: Color.fromARGB(255, 51, 45, 104), width: 2.0),
                        //borderRadius: const BorderRadius.all(Radius.circular(20.0),)
                        ),
                        border: 
                          OutlineInputBorder(
                            borderRadius: const BorderRadius.all(Radius.circular(0.0),),),
                            hintText: 'Pencarian',
                            contentPadding:
                              EdgeInsets.symmetric(vertical: 0, horizontal: 20),
                            prefixIcon: Icon(Icons.search)
                      ),
                    )),
            SizedBox(width: 480,),
            Row(
              children: [
              Icon(Icons.notifications, size: 40,color: Color.fromARGB(255, 51, 45, 104),),
              SizedBox(width: 10,),
              Icon(Icons.person, size: 40,color: Color.fromARGB(255, 51, 45, 104),),
              SizedBox(width: 10,),
              Icon(Icons.chat, size: 40,color: Color.fromARGB(255, 51, 45, 104),)
            ],)
          ],
        ),),
          SizedBox(height: 8,),
          Row(
            children: [
              Container(
               height:622,
                width: 1400,
                decoration: BoxDecoration(
                    color: Colors.white,
                  ),
                child: Row(
        mainAxisAlignment: MainAxisAlignment.start,
        children: [
          SideMenu(
            controller: page,
            style: SideMenuStyle(
              displayMode: SideMenuDisplayMode.auto,
              hoverColor: Colors.blue[100],
              selectedColor: Color.fromARGB(255, 51, 45, 104),
              selectedTitleTextStyle: TextStyle(color: Colors.white),
              selectedIconColor: Colors.white,
              // decoration: BoxDecoration(
              //   borderRadius: BorderRadius.all(Radius.circular(10)),
              // ),
              // backgroundColor: Colors.blueGrey[700]
            ),
            title: Column(
              children: [
                
                Divider(
                  indent: 8.0,
                  endIndent: 8.0,
                ),
              ],
            ),
            footer: Padding(
              padding: const EdgeInsets.all(8.0),
              child: Text(
                'By Ayu Hardiani',
                style: TextStyle(fontSize: 15),
              ),
            ),
            items: [
              SideMenuItem(
                priority: 0,
                title: 'Dashboard',
                onTap: () {
                  page.jumpToPage(0);
                },
                icon: Icon(Icons.home),
                //badgeContent: Text(
                  //'3',
                  //style: TextStyle(color: Colors.white),
                //),
              ),
              SideMenuItem(
                priority: 1,
                title: 'Dokter',
                onTap: () {
                  page.jumpToPage(1);
                },
                icon: Icon(Icons.supervisor_account),
              ),
              SideMenuItem(
                priority: 2,
                title: 'Antrean',
                onTap: () {
                  if(book == 0){
        
       page.animateToPage(
                        3,
                        duration: const Duration(milliseconds: 400),
                        curve: Curves.easeInOut,
                      );
          
  
} 
else {
     page.animateToPage(
                        2,
                        duration: const Duration(milliseconds: 400),
                        curve: Curves.easeInOut,
                      );
}          

      

    
  
                  
                },
                icon: Icon(Icons.history)
              ),
              SideMenuItem(
                priority: 6,
                title: 'Exit',
                onTap: () async {},
                icon: Icon(Icons.exit_to_app),
              ),
            ],
          ),
          Expanded(
            child: PageView(
              controller: page,
              children: [
                Container(
                  color: Color.fromARGB(255, 205, 227, 238),
                  child: 
                  Column(
                    mainAxisAlignment: MainAxisAlignment.start,
                    crossAxisAlignment: CrossAxisAlignment.start,
                    children: [
                  SizedBox(height: 30,),
                  Row(
                    children: [
                      SizedBox(width: 50,),
                      Column(
                      mainAxisAlignment: MainAxisAlignment.start,
                      crossAxisAlignment: CrossAxisAlignment.start,
                      children : [
                      Text("SELAMAT DATANG DI",
                      style: TextStyle(fontSize: 30, fontWeight: FontWeight.bold),),
                      Text("SISTEM ANTRIAN KONSULTASI HAMIL",
                      style: TextStyle(fontSize: 20, ),)

                    ]),
                    SizedBox(width: 490),
                    Text("Sunday, 08-05-2022",
                      style: TextStyle(fontSize: 20, fontWeight: FontWeight.bold),),

                  ],),
                  SizedBox(height: 50,),
                  Row(
                   
                    crossAxisAlignment: CrossAxisAlignment.start,
                    
                    children: [
                      SizedBox(width: 50,),
                      Container(
        alignment: Alignment.center,
        height: 450,
        width: 450,
        decoration: BoxDecoration(
                    color: Color.fromARGB(255, 255, 255, 255),
                    borderRadius: BorderRadius.all( Radius.circular(40.0),)
      
                  ),),
                  SizedBox(width: 50,),
                  Container(
        //alignment: Alignment.center,
        height: 200,
        width: 230,
        decoration: BoxDecoration(
                    color: Color.fromARGB(255, 255, 255, 255),
                    borderRadius: BorderRadius.all( Radius.circular(40.0),)
                  ),),
                  SizedBox(width: 50,),
                  Container(
        //alignment: Alignment.center,
        height: 200,
        width: 230,
        decoration: BoxDecoration(
                    color: Color.fromARGB(255, 255, 255, 255),
                    borderRadius: BorderRadius.all( Radius.circular(40.0),)
                  ),)
                    ],
                  )
              ])

                ),
                Container(
                  color: Color.fromARGB(255, 205, 227, 238),
                  
                  child: 
                    Column(
                      children: [
                      SizedBox(height: 20,),
                      SizedBox(
                      height: 600,
                      width: 1001,
                        child: ListView(
                          scrollDirection: Axis.vertical,
                          shrinkWrap: true,
                          children: dokter,
                      ),
                    ),
                    ])
                ),
                Container(
                  color: Colors.white,
                  child: Center(
                    child: Informasi(),
  
                    
                  ),
                ),
                Container(
                  color: Color.fromARGB(255, 205, 227, 238),
                  child: Center(
                    child: Informasi1(),
  
                    
                  ),
                ),
                
              ],
            ),
          ),
        ],
      ),),
            ],
          )
          ],
        ),),
        
      
        )));
        }}