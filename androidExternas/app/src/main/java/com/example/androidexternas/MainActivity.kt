package com.example.androidexternas

import android.app.VoiceInteractor
import android.content.Intent
import androidx.appcompat.app.AppCompatActivity
import android.os.Bundle
import android.view.View
import android.view.textclassifier.TextSelection
import android.widget.EditText
import android.widget.TextView
import com.android.volley.Response
import com.android.volley.Request
import com.android.volley.toolbox.StringRequest
import com.android.volley.toolbox.Volley
import com.example.androidexternas.databinding.ActivityMainBinding


class MainActivity : AppCompatActivity() {
    lateinit var enviarnombre:EditText
    lateinit var valor:TextView
    lateinit var enviarapellido:EditText
    lateinit var enviarid:EditText
    lateinit var enviarcelular:EditText
    lateinit var enviarcodigo:EditText



    override fun onCreate(savedInstanceState: Bundle?) {
        super.onCreate(savedInstanceState)
        val binding=ActivityMainBinding.inflate(layoutInflater)
        enviarnombre=binding.nombre
        valor = binding.valor
        enviarapellido  = binding.apellidos
        enviarid = binding.identificacion
        enviarcelular = binding.celular
        enviarcodigo = binding.codigo

        setContentView(binding.root)
    }

    fun llamarVentanaRegresarMenu(view: View){
        val opcion1= Intent(this,Menu::class.java)
        startActivity(opcion1)
    }

    fun llamarVentanaRegresarLogin(view: View){
        val opcion1= Intent(this,Login::class.java)
        startActivity(opcion1)
    }




    fun insertar_cliente (view: View){

        val url="http://192.168.1.14/ProgramacionMovilWeb/Models/agregarClienteMovil.php?nombre="+enviarnombre.text.toString()+"&apellido="+enviarapellido.text.toString()+"&identificacion="+
                enviarid.text.toString()+"&celular="+enviarcelular.text.toString()
        val cola=Volley.newRequestQueue(this)
        val StringRequest = StringRequest(Request.Method.GET, url,Response.Listener<String>
        {
                response -> valor.text="**" +response.toString()
        },
            Response.ErrorListener {valor.setText("error")} )

        cola.add(StringRequest)

    }


    fun borrar_cliente(view: View){
        //val url="http://192.168.56.1/recibir/agregar_clienteMobil.php?nombre="+enviarnombre.text.toString()
        val url="http://192.168.1.14/ProgramacionMovilWeb/Models/borrarClienteMovil.php?codigo="+enviarcodigo.text.toString()
        val cola=Volley.newRequestQueue(this)
        val StringRequest = StringRequest(Request.Method.GET, url,Response.Listener<String>
        {
                response -> valor.text="**" +response.toString()
        },
            Response.ErrorListener {valor.setText("error")} )

        cola.add(StringRequest)

    }



    fun modificar_cliente (view: View){

        val url="http://192.168.1.14/ProgramacionMovilWeb/Models/modificarClienteMovil.php?nombre="+enviarnombre.text.toString()+"&apellido="+enviarapellido.text.toString()+"&identificacion="+
                enviarid.text.toString()+"&celular="+enviarcelular.text.toString()+"&codigo="+enviarcodigo.text.toString()
        val cola=Volley.newRequestQueue(this)
        val StringRequest = StringRequest(Request.Method.GET, url,Response.Listener<String>
        {
                response -> valor.text="**" +response.toString()
        },
            Response.ErrorListener {valor.setText("error")} )

        cola.add(StringRequest)

    }


    fun leer_cliente(view: View){

        val url="http://192.168.1.14/ProgramacionMovilWeb/Models/leerClienteMovil.php"
        val cola=Volley.newRequestQueue(this)
        val StringRequest = StringRequest(Request.Method.GET, url,Response.Listener<String>
        {
                response -> valor.text="**" +response.toString()
        },
            Response.ErrorListener {valor.setText("error")} )

        cola.add(StringRequest)

    }

}