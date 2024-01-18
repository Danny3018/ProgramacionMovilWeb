package com.example.androidexternas

import android.content.Intent
import androidx.appcompat.app.AppCompatActivity
import android.os.Bundle
import android.view.View
import android.widget.EditText
import android.widget.TextView
import android.widget.Toast
import com.android.volley.Request
import com.android.volley.Response
import com.android.volley.toolbox.StringRequest
import com.android.volley.toolbox.Volley
import com.example.androidexternas.databinding.ActivityLoginBinding
import com.example.androidexternas.databinding.ActivityMainBinding

class Login : AppCompatActivity() {

    lateinit var Correo:EditText
    lateinit var Contraseña:EditText
    lateinit var Login:TextView


    override fun onCreate(savedInstanceState: Bundle?) {

        super.onCreate(savedInstanceState)
        val binding= ActivityLoginBinding.inflate(layoutInflater)
        Correo=binding.Correo
        Contraseña=binding.contrasena
        Login=binding.Login

        setContentView(binding.root)

    }


    fun llamarVentanaMenu(){

        val opcion1= Intent(this,Menu::class.java)
        startActivity(opcion1)
    }

    fun llamarVentanaRegistro(view: View){
        val opcion2= Intent(this,Registrase::class.java)
        startActivity(opcion2)
    }


    fun insertar_usuario (view: View){

        val url="http://192.168.1.14/ProgramacionMovilWeb/Models/indexLoginMovil.php?correo="+Correo.text.toString()+"&contraseña="+Contraseña.text.toString()

        val cola= Volley.newRequestQueue(this)
        val StringRequest = StringRequest(
            Request.Method.GET, url, Response.Listener<String>
            {
                    response ->
                if (response.toString() == "datos correctos"){
                    llamarVentanaMenu()
                } else {
                    Toast.makeText(  this ,"Datos incorrectos", Toast.LENGTH_SHORT).show()
                }
            },
           Response.ErrorListener {Toast.makeText(  this ,"Error", Toast.LENGTH_SHORT).show()}
        )

        cola.add(StringRequest)

    }












}