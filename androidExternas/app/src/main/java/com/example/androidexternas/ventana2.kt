package com.example.androidexternas

import android.R
import android.content.Intent
import android.graphics.Color
import androidx.appcompat.app.AppCompatActivity
import android.os.Bundle
import android.view.View
import android.widget.ArrayAdapter
import android.widget.EditText
import android.widget.Spinner
import android.widget.TextView
import com.android.volley.Request
import com.android.volley.Response
import com.android.volley.toolbox.StringRequest
import com.android.volley.toolbox.Volley
import com.example.androidexternas.databinding.ActivityMainBinding
import com.example.androidexternas.databinding.ActivityVentana2Binding

class ventana2 : AppCompatActivity() {

    lateinit var codigo: EditText
    lateinit var Matriculas: EditText
    lateinit var valor: TextView
    lateinit var color: EditText
    lateinit var Marca: EditText
    lateinit var Nopuertas: EditText
    lateinit var spinner:Spinner
    private val opcionesArray = mutableListOf<String>()

    //lateinit var enviarcodigo: EditText

    override fun onCreate(savedInstanceState: Bundle?) {
        super.onCreate(savedInstanceState)
        val binding = ActivityVentana2Binding.inflate(layoutInflater)

        codigo = binding.codigo
        Matriculas = binding.Matricula
        valor = binding.valor
        color = binding.Color
        Marca = binding.Marca
        Nopuertas = binding.NoPuertas
        spinner = binding.spinerCliente

        // se crea un ArrayAdapter utilizando el array y el diseño predeterminado para los elementos del spinner





        val url="http://192.168.1.14/ProgramacionMovilWeb/Models/datosSpinner.php"
        val cola= Volley.newRequestQueue(this)

        val StringRequest = StringRequest(
            Request.Method.GET, url, Response.Listener<String>
            { response ->
                //GENNERAL: extrae los datos solicitados los mete en una lista y los depliega en el spiner
                // Agrega todas las opciones de la base de datos a el array o lista
                opcionesArray.addAll(response.toString().split(",")) //.split para separar cada valor cada vez que salga un a coma
                //adaptar el spinner a la lista o array
                val adapter = ArrayAdapter(this, R.layout.simple_spinner_item, opcionesArray.toTypedArray())
                // se especifica el diseño a utilizar cuando aparece el menú desplegable
                adapter.setDropDownViewResource(R.layout.simple_spinner_dropdown_item)
                // Aplica el adaptador al spinner
                spinner.adapter = adapter



            },
            Response.ErrorListener {valor.setText(spinner.selectedItem.toString())} )
        cola.add(StringRequest)







        setContentView(binding.root)


    }






    fun llamarVentanaRegresarMenu(view: View){
        val opcion1= Intent(this,Menu::class.java)
        startActivity(opcion1)
    }



    fun insertar_vehiculo (view: View){

        val url="http://192.168.1.14/ProgramacionMovilWeb/Models/agregarVehiculoMovil.php?matricula="+Matriculas.text.toString()+"&color="+color.text.toString()+"&marca="+
                Marca.text.toString()+"&numeroPuertas="+Nopuertas.text.toString()+"&codigoCliente="+spinner.selectedItem.toString()
        val cola= Volley.newRequestQueue(this)
        val StringRequest = StringRequest(
            Request.Method.GET, url, Response.Listener<String>
            {
                    response -> valor.text="**" +response.toString()
            },
            Response.ErrorListener {valor.setText("error")} )

        cola.add(StringRequest)

    }


    fun modificar_vehiculo(view: View){

        val url="http://192.168.1.14/ProgramacionMovilWeb/Models/modificaVehiculoMovil.php?matricula="+Matriculas.text.toString()+"&color="+color.text.toString()+"&marca="+
                Marca.text.toString()+"&numeroPuertas="+Nopuertas.text.toString()+"&codigoCliente="+spinner.selectedItem.toString()+"&codigo="+codigo.text.toString()
        val cola= Volley.newRequestQueue(this)
        val StringRequest = StringRequest(
            Request.Method.GET, url, Response.Listener<String>
            {
                    response -> valor.text="**" +response.toString()
            },
            Response.ErrorListener {valor.setText("error")} )

        cola.add(StringRequest)

    }



    fun borrar_vehiculo(view: View){
        //val url="http://192.168.56.1/recibir/agregar_clienteMobil.php?nombre="+enviarnombre.text.toString()
        val url="http://192.168.1.14/ProgramacionMovilWeb/Models/borrarVehiculoMovil.php?codigo="+codigo.text.toString()
        val cola= Volley.newRequestQueue(this)
        val StringRequest = StringRequest(
            Request.Method.GET, url, Response.Listener<String>
            {
                    response -> valor.text="**" +response.toString()
            },
            Response.ErrorListener {valor.setText("error")} )

        cola.add(StringRequest)

    }




    fun leer_vehiculo(view: View){

        val url="http://192.168.1.14/ProgramacionMovilWeb/Models/leerVehiculoMovil.php"
        val cola= Volley.newRequestQueue(this)
        val StringRequest = StringRequest(
            Request.Method.GET, url, Response.Listener<String>
            {
                    response -> valor.text="**" +response.toString()
            },
            Response.ErrorListener {valor.setText("error")} )

        cola.add(StringRequest)

    }



}