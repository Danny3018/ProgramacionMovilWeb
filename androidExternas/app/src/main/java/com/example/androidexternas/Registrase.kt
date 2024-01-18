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
import com.example.androidexternas.databinding.ActivityRegistraseBinding

class Registrase : AppCompatActivity() {



    lateinit var CorreoRegistro: EditText
    lateinit var Contraseña: EditText
    lateinit var ConfirmacionContraseña: EditText



    override fun onCreate(savedInstanceState: Bundle?) {
        super.onCreate(savedInstanceState)
        val binding= ActivityRegistraseBinding.inflate(layoutInflater)

        CorreoRegistro=binding.CorreoRegistro
        Contraseña=binding.Clave
        ConfirmacionContraseña=binding.Claveconfirmacion


        setContentView(binding.root)

    }
    fun llamarVentanaRegresarLogin(view: View){
        val opcion1= Intent(this,Login::class.java)
        startActivity(opcion1)
    }

    fun llamarVentanaLogin(){
        val opcion2= Intent(this,Login::class.java)
        startActivity(opcion2)
    }



    fun registrar_usuario (view: View){

        val url="http://192.168.1.14/ProgramacionMovilWeb/Models/indexRegistroMovil.php?correo="+CorreoRegistro.text.toString()+
                "&contraseña="+Contraseña.text.toString()+"&verificaContraseña="+ ConfirmacionContraseña.text.toString()

        val cola= Volley.newRequestQueue(this)
        val StringRequest = StringRequest(
            Request.Method.GET, url, Response.Listener<String>
            {
                    response ->
                if (response.toString() == "usuario insertado"){
                    Toast.makeText(  this ,"Nuevo usuario creado", Toast.LENGTH_SHORT).show()
                    llamarVentanaLogin()
                } else {
                    Toast.makeText(  this ,"Las contraseñas no coinciden", Toast.LENGTH_SHORT).show()
                }
            },
            Response.ErrorListener { Toast.makeText(  this ,"Error", Toast.LENGTH_SHORT).show()}
        )

        cola.add(StringRequest)

    }

}