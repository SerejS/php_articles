<section class="section">
    <div class="container">
        <div class="columns is-half">
            {{ range . }}
            <div class="column">
                <article class="box">
                    <a class="title is-3 mb-2" href="/article/{{ .Id }}/">{{ .Title }}</a>
                    <br>
                    <strong>{{ .Author }}</strong>
                    <p>{{ .Time.Format "2006.01.02" }}</p>
                </article>
            </div>
            {{ end }}
        </div>
    </div>
</section>