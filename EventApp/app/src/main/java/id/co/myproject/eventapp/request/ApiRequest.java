package id.co.myproject.eventapp.request;

import java.util.List;

import id.co.myproject.eventapp.model.Value;
import retrofit2.Call;
import retrofit2.http.Field;
import retrofit2.http.FormUrlEncoded;
import retrofit2.http.GET;
import retrofit2.http.POST;
import retrofit2.http.Query;

public interface ApiRequest {
    @FormUrlEncoded
    @POST("registrasi_user.php")
    Call<Value> registrasiUserRequest(
            @Field("email") String email,
            @Field("password") String password,
            @Field("nama") String nama,
            @Field("gambar") String gambar
    );

    @FormUrlEncoded
    @POST("login_user.php")
    Call<Value> loginUserRequest(
            @Field("email") String email,
            @Field("password") String password
    );

}
